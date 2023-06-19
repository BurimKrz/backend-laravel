<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('http://127.0.0.1:8000/api/email', [

        'name' => 'ELSA',
        'email' => 'ramadani.elsa.01@gmail.com',
        'message' => 'Test'
        ]);
        $response->assertStatus(200);
    }
}
