<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct(public UserRepository $userRepository)
    {
    }

    public function index()
    {
        Gate::authorize('viewAny', User::class);
        $users = $this->userRepository->all();
        return response()->json(['data' => $users]);
    }

    public function store(CreateUserRequest $request)
    {

        Gate::authorize('create', User::class);

        $data = $request->validated();
        $data['password'] = Str::password(8);
        $user = $this->userRepository->store($data);
        return response()->json(['message' => __('user.created'), "data" => $user]);
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        Gate::authorize('update', $user);
        $this->userRepository->update($user->id, $request->validated());
        $user = $this->userRepository->find($user->id);
        return response()->json(['message' => __('user.updated'), "data" => $user]);
    }

    public function destroy(User $user): JsonResponse
    {
        Gate::authorize('delete', $user);
        $this->userRepository->delete($user->id);
        return response()->json(['message' => __('user.deleted')]);
    }

    public function show(User $user)
    {
        Gate::authorize('view', $user);
        return response()->json(['data' => $user]);
    }
}
