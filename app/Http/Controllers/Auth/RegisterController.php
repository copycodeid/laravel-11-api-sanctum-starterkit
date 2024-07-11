<?php

namespace App\Http\Controllers\Auth;

use App\Contract\AuthRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use F9Web\ApiResponseHelpers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use ApiResponseHelpers;

    public function __invoke(RegisterRequest $request, AuthRepositoryContract $authRepositoryContract): JsonResponse
    {
        $result = $authRepositoryContract->register($request->only(['name', 'email', 'password']));

        return $this->respondCreated(data: $result);
    }
}
