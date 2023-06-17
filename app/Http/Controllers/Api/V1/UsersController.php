<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $users = User::query()->with('transactions')->filter()->latest('created_at')->paginate($request->per_page > 0 ? $request->per_page : 10);
        return UserResource::collection($users)->additional([
            'meta' => [
                'success' => true,
                'message' => 'Users retrieved successfully, with their transactions',
            ],
        ])->response()->setStatusCode(200);
    }
}
