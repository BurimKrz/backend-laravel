<?php

namespace Tests\Feature;

use Tests\TestCase;

class FilterSubcategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_filter_Subcategory(): void
    {

        $c_id = 5;
        $s_id = 1;
        $response = $this->get('http://127.0.0.1:8000/api/subcategory/' . $c_id . '/' . $s_id);
        $response->assertStatus(200);
        $response->assertJson([
            [
                'name' => "ipsam",
                'description' => "Beatae ut nam natus incidunt beatae.",
                'price' => "988.68",
                'imageURL' => "https://via.placeholder.com/640x480.png/0077bb?text=product+Faker+nisi",
                'company' => "McKenzie Ltd",
                'country' => "Australia",
            ],
        ]);
    }
}
