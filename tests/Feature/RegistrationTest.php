<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Ermira',
            'surname' => 'Bajrami',
            'email' => 'ermirabajrami@gmail.com',
            'password' => 'Ermira123',
            'phone_number' => '044222333',
            'country' => 'Kosove',
            'gender' => 'female',
        ]);
 
        // $this->assertAuthenticated();
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
