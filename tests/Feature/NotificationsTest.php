<?php

namespace Tests\Feature;

use Tests\TestCase;

class NotificationsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_notifications(): void
    {
        $Uid      = 5;
        $Pid      = 1;
        $response = $this->get('http://127.0.0.1:8000/api/Notify/' . $Uid . '/' . $Pid);
        $response->assertStatus(200);

        $response->assertJson([
            "Full Name" => "Marie Stoltenberg Hadley Wyman",
            "Product"   => "vel",
        ]);

    }
}
