<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckUserTokenController extends Controller
{
    use ApiResponseHelpers;

    public function __invoke(Request $request): JsonResponse
    {
        if ($request->user('sanctum')) {
            return $this->apiResponse([
                'status' => Response::HTTP_OK,
                'message' => 'authenticated',
            ], Response::HTTP_OK);
        }

        return $this->apiResponse([
            'status' => Response::HTTP_UNAUTHORIZED,
            'message' => 'unauthenticated',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
