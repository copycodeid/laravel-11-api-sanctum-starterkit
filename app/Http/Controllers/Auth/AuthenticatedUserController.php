<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\AuthenticatedUserResource;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthenticatedUserController extends Controller
{
    use ApiResponseHelpers;

    public function __invoke(Request $request): JsonResponse
    {
        return $this->respondWithSuccess(
            contents: ['user' => new AuthenticatedUserResource($request->user())],
        );
    }
}
