<?php

namespace Tests\Feature;

use Tests\TestCase;

class CommunicateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_communicate(): void
    {
        $response = $this->get('http://127.0.0.1:8000/api/form/5');
        $response->assertStatus(200);

        $response->assertJson([
            [
                "Product_ID" => 5,
                "Product"    => "autem",
                "Owner_id"   => 1,
                "email"      => "trey.gerhold@example.net",
            ],
        ]);

    }
}
