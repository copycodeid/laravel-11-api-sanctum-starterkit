<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    use ApiResponseHelpers;

    public function __invoke(Request $request): JsonResponse
    {
        $request->user('sanctum')->tokens()->delete();

        return $this->respondWithSuccess(
            sendSuccessData(
                message: 'Logout Success'
            ),
        );
    }
}
