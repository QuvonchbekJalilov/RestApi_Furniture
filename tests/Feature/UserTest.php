<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    
    public function  user_all(): void
    {
        $user = User::factory()->create();
        $response = $this->get('/api/user');

        $response->assertStatus(200);

        $response->assertJson([
            'data' => true,
        ]);
    }
}
