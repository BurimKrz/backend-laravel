<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTokenTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_update_token(): void
    {
        $response = $this->put('/api/updateToken/1', [

            "amount" => 200
         ]);

        $response->assertStatus(200);
    }
}
