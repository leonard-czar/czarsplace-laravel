<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartServerPricingTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_to_cart_ignores_tampered_price_and_uses_database_unit_price(): void
    {
        $user = User::factory()->create();

        $brand = new Brand;
        $brand->brandname = 'Test Brand';
        $brand->brandimg = 'b.png';
        $brand->save();

        $product = new Product;
        $product->brand_id = $brand->id;
        $product->watch_name = 'Submariner';
        $product->watch_description = 'Steel diver';
        $product->watch_price = '500000';
        $product->watch_image = 'x.png';
        $product->save();

        $this->actingAs($user)->post(route('cart'), [
            'watchid' => $product->id,
            'qty' => 2,
            'price' => '1',
        ])->assertRedirect();

        $line = Cart::query()->where('user_id', $user->id)->where('product_id', $product->id)->first();
        $this->assertNotNull($line);
        $this->assertEquals(500000.0, (float) $line->price);
        $this->assertEquals(1000000.0, (float) $line->total);
    }

    public function test_cart_quantity_update_recomputes_total_from_database_price(): void
    {
        $user = User::factory()->create();

        $brand = new Brand;
        $brand->brandname = 'Omega';
        $brand->brandimg = 'o.png';
        $brand->save();

        $product = new Product;
        $product->brand_id = $brand->id;
        $product->watch_name = 'Speedmaster';
        $product->watch_description = 'Moonwatch';
        $product->watch_price = '300000';
        $product->watch_image = 's.png';
        $product->save();

        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->product_id = $product->id;
        $cart->qty = '1';
        $cart->price = '100';
        $cart->total = '100';
        $cart->save();

        $this->actingAs($user)->put(route('editqty', $cart->id), [
            'quantity' => 3,
            'price' => '1',
        ])->assertRedirect(route('showcart'));

        $cart->refresh();
        $this->assertSame('3', (string) $cart->qty);
        $this->assertEquals(300000.0, (float) $cart->price);
        $this->assertEquals(900000.0, (float) $cart->total);
    }
}
