<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use App\Models\company;
use Tests\TestCase;

class CompanyListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_company_list(): void
    {
        $companies = Company::all();
          $response = $this->get('http://127.0.0.1:8000/api/CompanyList');

    $response->assertStatus(200);
       $response->assertJson([
            'data' => $companies->map(function ($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->name,
                    'keywords' => $company->keywords,
                    'country' => $company->country,
                    'web_address' => $company->web_address,
                    'more_info' => $company->more_info,
                    'type' => $company->type,
                ];
            })->toArray(),
        ]);
    }
}