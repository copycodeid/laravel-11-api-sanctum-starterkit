<?php

namespace App\Http\Controllers\Auth;

use App\Contract\AuthRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    use ApiResponseHelpers;

    public function __invoke(LoginRequest $request, AuthRepositoryContract $authRepositoryContract): JsonResponse
    {
        $result = $authRepositoryContract->login($request->only(['email', 'password']));

        return $this->respondWithSuccess($result);
    }
}
