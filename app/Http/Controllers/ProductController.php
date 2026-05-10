<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    private function brandListingBySlug(string $slug): View
    {
        $brandId = Brand::idForCatalogSlug($slug);
        if ($brandId === null) {
            abort(404, 'This collection is not available for your current brands.');
        }

        $products = Product::where('brand_id', $brandId)->paginate(24);
        $brand = Brand::findOrFail($brandId);

        return view('brand-collection', [
            'products' => $products,
            'brand' => $brand,
        ]);
    }

    private function genderListing(string $gender, string $viewKey, string $view): View
    {
        $items = Product::where('gender', $gender)->paginate(24);

        return view($view, [$viewKey => $items]);
    }

    private function parseSearchTerm(Request $request, string $inputKey): string
    {
        return strtolower(trim((string) $request->input($inputKey)));
    }

    private function resolveSearchRedirect(string $search): ?RedirectResponse
    {
        $byKeyword = [
            'rolex' => 'rolex',
            'hublot' => 'hublot',
            'male' => 'malewatch',
            'men' => 'malewatch',
            'female' => 'femalewatch',
            'woman' => 'femalewatch',
            'women' => 'femalewatch',
            'ladies' => 'femalewatch',
        ];

        if (isset($byKeyword[$search])) {
            return redirect()->route($byKeyword[$search]);
        }

        if (in_array($search, ['audemars', 'audemars piguet', 'ap'], true)) {
            return redirect()->route('audemars');
        }

        $catalogBrand = Brand::query()
            ->where('brandname', 'like', '%'.$search.'%')
            ->orderBy('brandname')
            ->first();
        if ($catalogBrand !== null && $catalogBrand->catalogRouteName() !== null) {
            return redirect()->route($catalogBrand->catalogRouteName());
        }

        if ($catalogBrand !== null) {
            return redirect()->route('displaybrands');
        }

        return null;
    }

    private function buildSearchQuery(string $search)
    {
        return Product::query()
            ->with('brand')
            ->where(function ($q) use ($search) {
                $q->where('watch_name', 'like', '%'.$search.'%')
                    ->orWhere('collection', 'like', '%'.$search.'%')
                    ->orWhere('watch_description', 'like', '%'.$search.'%')
                    ->orWhereHas('brand', function ($brandQ) use ($search) {
                        $brandQ->where('brandname', 'like', '%'.$search.'%');
                    });
            });
    }

    /**
     * Accept both watch_description (canonical) and legacy watch_desc from the form.
     * Merge to watch_description so validation always sees one field.
     */
    private function mergeProductDescriptionInput(Request $request): void
    {
        $raw = $request->input('watch_description');
        if ($raw === null || $raw === '') {
            $raw = $request->input('watch_desc');
        }
        if ($raw === null) {
            $raw = '';
        }
        $normalized = is_string($raw) ? trim($raw) : $raw;
        $request->merge(['watch_description' => $normalized]);
    }

    private function applyProductFieldsFromRequest(Product $product, Request $request): void
    {
        $data = [
            'watch_name' => $request->input('watch_name'),
            'watch_description' => $request->input('watch_description'),
            'watch_price' => $request->input('watch_price'),
            'collection' => $request->input('collection'),
            'reference_number' => $request->input('ref_no'),
            'case_description' => $request->input('Case_desc'),
            'gender' => $request->input('gender'),
            'movement' => $request->input('movement'),
            'dial' => $request->input('dial'),
            'Bezel' => $request->input('bezel'),
            'crystal' => $request->input('crystal'),
            'caliber' => $request->input('caliber'),
            'watch_function' => $request->input('watch_function'),
            'mechanism' => $request->input('mechanism'),
            'number_of_jewels' => $request->input('number_of_jewels'),
            'total_diameter' => $request->input('total_diameter'),
            'power_reserve' => $request->input('power_reserve'),
            'number_of_parts' => $request->input('number_of_parts'),
            'frequency' => $request->input('frequency'),
            'bracelet' => $request->input('bracelet'),
            'clasp' => $request->input('clasp'),
            'water_resistance' => $request->input('water_resistance'),
        ];

        if ($request->filled('brandid')) {
            $data['brand_id'] = $request->input('brandid');
        }

        $product->fill($data);
    }

    public function insertProduct(Request $request)
    {
        $this->mergeProductDescriptionInput($request);

        $request->validate([
            'watch_name' => 'required|string|max:100',
            'watch_price' => 'required|numeric',
            'watch_description' => 'required|string|max:60000',
            'brandid' => 'required|exists:brands,id',
            'watch_image' => 'required|image|max:5120',
        ], [
            'watch_image.required' => 'please upload an image',
            'watch_description.required' => 'please enter a description',
            'watch_price.required' => 'please set a price',
            'watch_price.numeric' => 'the watch price should be a number',
            'watch_name.required' => 'please enter a name',
        ], [
            'watch_description' => 'description',
            'watch_price' => 'price',
        ]);

        $path = $request->file('watch_image')->store('Watchimages', 'public');

        $product = new Product;
        $this->applyProductFieldsFromRequest($product, $request);
        $product->watch_image = $path;
        $product->save();

        return redirect('allproduct')->with('success', 'Product was added successfully!');
    }

    public function getAllProduct(): View
    {
        $products = Product::with('brand')->orderBy('id')->paginate(20);

        return view('allproducts')->with('products', $products);
    }

    /**
     * Dedicated brand collection pages (slug set per route via defaults() in routes/web.php).
     */
    public function displayBrandCollection(string $catalogSlug): View
    {
        return $this->brandListingBySlug($catalogSlug);
    }

    public function displayMaleWatch(): View
    {
        return $this->genderListing('male', 'male', 'malewatches');
    }

    public function displayIndexMaleWatch(): View
    {
        return $this->displayMaleWatch();
    }

    public function displayFemaleWatch(): View
    {
        return $this->genderListing('female', 'female', 'femalewatches');
    }

    public function displayIndexFemaleWatch(): View
    {
        return $this->displayFemaleWatch();
    }

    /**
     * Storefront home (same for guests and signed-in customers).
     */
    public function shopHome(): View
    {
        $brands = Brand::with('products')->orderBy('brandname')->get();

        return view('dashboard', [
            'brands' => $brands,
        ]);
    }

    public function index(): View
    {
        return $this->shopHome();
    }

    public function displayProducts(): View
    {
        return $this->shopHome();
    }

    public function get_Product($id): View
    {
        $product = Product::with('brand')->findOrFail($id);

        return view('watchspec')->with('product', $product);
    }

    public function getProductToEdit($id): View
    {
        $product = Product::findOrFail($id);
        $brands = Brand::orderBy('brandname')->get();

        return view('editproduct', [
            'product' => $product,
            'brands' => $brands,
        ]);
    }

    public function editProduct(Request $request, $id)
    {
        $this->mergeProductDescriptionInput($request);

        $request->validate([
            'watch_name' => 'required|string|max:100',
            'watch_description' => 'required|string|max:60000',
            'watch_price' => 'required|numeric',
            'brandid' => 'required|exists:brands,id',
            'gender' => 'nullable|in:male,female',
            'watch_image' => 'nullable|image|max:5120',
        ], [
            'watch_description.required' => 'please enter a description',
        ], [
            'watch_description' => 'description',
        ]);
        $product = Product::findOrFail($id);
        $this->applyProductFieldsFromRequest($product, $request);
        if ($request->hasFile('watch_image')) {
            $previousImage = $product->watch_image;
            $path = $request->file('watch_image')->store('Watchimages', 'public');
            $product->watch_image = $path;
            if ($previousImage && $previousImage !== $path && Storage::disk('public')->exists($previousImage)) {
                Storage::disk('public')->delete($previousImage);
            }
        }
        $product->save();

        return redirect('allproduct')->with('success', 'Product was updated successfully!');
    }

    public function deleteProduct($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->action([ProductController::class, 'getAllProduct']);
    }

    public function redirect(Request $request): RedirectResponse
    {
        $search = $this->parseSearchTerm($request, 'searchbox');
        if ($search === '') {
            $search = $this->parseSearchTerm($request, 'isearchbox');
        }

        if ($search === '') {
            return back()->with('failed', 'Please enter a search term.');
        }

        $resolved = $this->resolveSearchRedirect($search);

        if ($resolved !== null) {
            return $resolved;
        }

        return redirect()->route('search.results', ['q' => $search]);
    }

    public function searchResults(Request $request): RedirectResponse|View
    {
        $search = strtolower(trim((string) $request->query('q', '')));
        if ($search === '') {
            return redirect()->route('home')->with('failed', 'Please enter a search term.');
        }

        $products = $this->buildSearchQuery($search)
            ->orderBy('id')
            ->paginate(24)
            ->withQueryString();

        return view('search-results', [
            'search' => $search,
            'products' => $products,
        ]);
    }
}
