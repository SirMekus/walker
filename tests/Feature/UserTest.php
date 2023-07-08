<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->post('/login', ['email' => 'lyost@example.net', 'password'=>'password']);

        $response->assertStatus(200);
    }

    public function test_change_email()
    {
        $user = User::where('email', 'lyost@example.net')->first();

        $response = $this->withHeaders([
            'X-Requested-With' => 'XMLHttpRequest',
        ])
        ->actingAs($user)
        ->post('/change-email', [
            'current_email' => 'lyost@example.net', 
            'new_email' => 'lyost@example.net'
        ]);

        $response->assertStatus(200);
    }
}
