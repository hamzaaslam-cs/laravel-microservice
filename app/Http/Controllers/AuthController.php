<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;

use App\Http\Requests\Auth\RegistrationRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{
    public function __construct(public UserRepository $userRepository)
    {
    }

    /**
     * Register a User.
     *
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function register(RegistrationRequest $request): JsonResponse
    {
        $user = $this->userRepository->store($request->validated());
        return response()->json($user, 200);
    }


    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        if (!$token = auth("api")->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth("api")->logout();

        return response()->json(['message' => __('user.logout')]);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth("api")->refresh());
    }
}
