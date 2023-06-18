<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserService
{
    public function index(): JsonResponse
    {
        $users =  User::query()->with('transactions')->filter()->filterAmoutRange()->latest('created_at')->paginate(request()->per_page > 0 ? request()->per_page : 10);
        return UserResource::collection($users)->additional([
            'meta' => [
                'success' => true,
                'message' => 'Users retrieved successfully, with their transactions',
            ],
        ])->response()->setStatusCode(200);
    }

    public function show(User $user): JsonResponse
    {
        return (new UserResource($user->load('transactions')))->additional([
            'meta' => [
                'success' => true,
                'message' => 'User retrieved successfully, with their transactions',
            ],
        ])->response()->setStatusCode(200);
    }
}