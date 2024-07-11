<?php

namespace App\Repository;

use App\Contract\AuthRepositoryContract;
use App\Http\Resources\Auth\AuthenticatedUserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepository implements AuthRepositoryContract
{
    public function __construct(protected User $user, protected Builder $baseQuery)
    {
        $this->baseQuery = $user->query();
    }

    public function register(array $data): array
    {
        User::create([
            'name' => $name = $data['name'],
            'username' => generateUsername($name),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return sendSuccessData(
            message: 'User has been created successfully!',
        );
    }

    public function login(array $data): array
    {
        $requestedUser = $this->baseQuery->where('email', $data['email'])->first();

        if (! $requestedUser || ! Hash::check($data['password'], $requestedUser->password)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $requestedUser->tokens()->delete();

        $token = $requestedUser->createToken(name: "login-api-token-{$requestedUser->id}", expiresAt: now()->addHours(value: 5));

        return sendSuccessData(
            data: [
                'user' => new AuthenticatedUserResource($requestedUser),
                'access_token' => [
                    'expires_at' => $token->accessToken->expires_at,
                    'token' => $token->plainTextToken,
                ],
            ]
        );
    }
}
