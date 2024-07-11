<?php

namespace App\Contract;

interface AuthRepositoryContract
{
    public function register(array $data): array;

    public function login(array $data): array;
}
