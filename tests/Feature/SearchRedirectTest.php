<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_redirects_to_results_for_product_name_query(): void
    {
        $brand = new Brand;
        $brand->brandname = 'Omega';
        $brand->brandimg = 'omega.png';
        $brand->save();

        $product = new Product;
        $product->brand_id = $brand->id;
        $product->watch_name = 'Seamaster Aqua Terra';
        $product->watch_description = 'Test watch';
        $product->watch_price = '1000';
        $product->watch_image = 'test.png';
        $product->save();

        $this->post(route('redirect'), [
            'searchbox' => 'seamaster',
        ])->assertRedirect(route('search.results', ['q' => 'seamaster']));
    }

    public function test_search_redirects_to_brands_page_for_non_catalog_brand_name(): void
    {
        $brand = new Brand;
        $brand->brandname = 'Omega';
        $brand->brandimg = 'omega.png';
        $brand->save();

        $this->post(route('redirect'), [
            'searchbox' => 'omega',
        ])->assertRedirect(route('displaybrands'));
    }

    public function test_search_results_page_shows_all_matching_products_with_pagination(): void
    {
        $brand = new Brand;
        $brand->brandname = 'Rolex';
        $brand->brandimg = 'rolex.png';
        $brand->save();

        for ($i = 1; $i <= 26; $i++) {
            $product = new Product;
            $product->brand_id = $brand->id;
            $product->watch_name = 'Datejust '.$i;
            $product->watch_description = 'Datejust test watch '.$i;
            $product->watch_price = (string) (1000 + $i);
            $product->watch_image = 'dj-'.$i.'.png';
            $product->save();
        }

        $response = $this->get(route('search.results', ['q' => 'datejust']));

        $response->assertOk();
        $response->assertSee('Datejust 1');
        $response->assertSee('Datejust 24');
        $response->assertDontSee('Datejust 26');
        $response->assertSee('page=2');
    }
}

