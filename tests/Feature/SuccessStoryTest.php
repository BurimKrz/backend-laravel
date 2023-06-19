<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SuccessStoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('http://127.0.0.1:8000/api/successStory', [
            "company_id" => 1,
            "topic"=> "example",
            "representative"=> "ceo",
            "position"=>"CEO",
            "message"=> "ASDFGHJKLrtyufiebrg",
            "image_URL"=> "fgerbn"
        ]);

        $response->assertStatus(200);
    }
}
