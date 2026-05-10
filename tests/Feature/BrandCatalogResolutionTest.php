<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandCatalogResolutionTest extends TestCase
{
    use RefreshDatabase;

    public function test_id_for_catalog_slug_matches_brand_name_not_primary_key(): void
    {
        $rolex = new Brand;
        $rolex->brandname = 'Rolex';
        $rolex->brandimg = 'placeholder.png';
        $rolex->save();

        $other = new Brand;
        $other->brandname = 'Omega';
        $other->brandimg = 'o.png';
        $other->save();

        $this->assertSame($rolex->id, Brand::idForCatalogSlug('rolex'));
        $this->assertNull(Brand::idForCatalogSlug('hublot'));
    }

    public function test_audemars_slug_matches_audemars_piguet_name(): void
    {
        $ap = new Brand;
        $ap->brandname = 'Audemars Piguet';
        $ap->brandimg = 'ap.png';
        $ap->save();

        $this->assertSame($ap->id, Brand::idForCatalogSlug('audemars'));
    }

    public function test_rolex_collection_route_returns_200_when_brand_exists(): void
    {
        $b = new Brand;
        $b->brandname = 'Rolex';
        $b->brandimg = 'r.png';
        $b->save();

        $this->get(route('rolex'))->assertOk();
    }

    public function test_rolex_collection_returns_404_when_no_matching_brand(): void
    {
        $b = new Brand;
        $b->brandname = 'Omega';
        $b->brandimg = 'o.png';
        $b->save();

        $this->get(route('rolex'))->assertNotFound();
    }
}
