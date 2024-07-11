<?php

namespace App\Repository;

use App\Contract\AuthRepositoryContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

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
}
