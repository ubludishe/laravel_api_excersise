<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {
        $users = $this->repository->index();
        return response()->json($users);
    }

    public function findByID($id): JsonResponse
    {
        $user = $this->repository->findByID($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function store(UserRequest $request): JsonResponse
    {
        $user = $this->repository->store($request->validated());

        return response()->json([
            'message' => 'User created',
            'user' => $user
        ], 201);
    }

    public function update(UserRequest $request, $id): JsonResponse
    {
        $user = $this->repository->findByID($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $updatedUser = $this->repository->update($user, $request->validated());

        return response()->json([
            'message' => 'User updated',
            'user' => $updatedUser
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $user = $this->repository->findByID($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $this->repository->destroy($user);

        return response()->json(['message' => 'User deleted'], 204);
    }
}
