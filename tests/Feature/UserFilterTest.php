<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFilterTest extends TestCase
{
    public function test_to_filter_users_by_name(): void
    {
        $user = User::query()->first();
        $response = $this->get("/api/v1/admin/users?search=$user->name");
        $this->assertEquals($user->name, $response->json('data.0.name'));
    }

    public function test_to_filter_users_by_email(): void
    {
        $user = User::query()->first();
        $response = $this->get("/api/v1/admin/users?search=$user->email");
        $this->assertEquals($user->email, $response->json('data.0.email'));
    }

    public function test_to_filter_users_by_amount(): void
    {
        $user = User::query()->first();
        $response = $this->get("/api/v1/admin/users?amount_from={$user->balance}&amount_to={$user->balance}");
        $this->assertEquals($user->name, $response->json('data.0.name'));
    }

    public function test_to_filter_users_by_date_from(): void
    {
        $response = $this->get("/api/v1/admin/users?created_at_from=2020-08-01?created_at_to=2020-08-02");
        $this->assertEquals('2020-08-02', $response->json('data.0.created_at'));
    }


}
