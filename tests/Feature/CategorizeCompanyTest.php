<?php

namespace Tests\Feature;

use App\Models\company;
use App\Models\company_category;
use App\Models\company_subcategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategorizeCompanyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test categorizing companies by category.
     */
    public function testCategorizeCompanies(): void
    {
        // Create a company category
        $category = company_category::factory()->create();

        // Create a company subcategory associated with the category
        $subcategory = company_subcategory::factory()->create(['category_id' => $category->id]);

        // Create 5 companies associated with the category and subcategory
        $companies = company::factory()->count(5)->create([
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
        ]);

        $response = $this->get('/api/filterCompany/' . $category->id);

        $response->assertStatus(200);

        // Assert that the response JSON contains the expected count of companies
        $response->assertJsonCount($companies->count());

        // Assert that the response JSON contains the data of the companies
        $response->assertJson($companies->map(function ($company) {
            return [
                "name" => $company->name,
                "keywords" => $company->keywords,
                "country" => $company->country,
                "web_address" => $company->web_address,
                "more_info" => $company->more_info,
                "type" => $company->type,
            ];
        })->toArray());
    }
}
