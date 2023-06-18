<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class UserApiTest extends TestCase
{
    public function test_to_retrieve_all_users(): void
    {
        $response = $this->get('/api/v1/admin/users');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'email',
                    'balance',
                    'created_at',
                    'transactions' => [
                        '*' => [
                            'id',
                            'status',
                            'amount',
                            'payment_date',
                        ],
                    ],
                ],
            ],
            'meta' => [
                'success',
                'message',
            ],
        ]);
    }

    public function test_to_retrieve_a_single_user(): void
    {
        $user = User::query()->first();
        $response = $this->get('/api/v1/admin/users/' . $user->uuid);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'balance',
                'created_at',
                'transactions' => [
                    '*' => [
                        'id',
                        'status',
                        'amount',
                        'payment_date',
                    ],
                ],
            ],
            'meta' => [
                'success',
                'message',
            ],
        ]);
    }

    public function test_to_retrieve_a_single_user_with_invalid_uuid(): void
    {
        $response = $this->get('/api/v1/admin/users/invalid-uuid');
        $response->assertStatus(404);
    }
}
