<?php

namespace App\Contract;

interface AuthContract
{
    public function login(array $credentials);
    public function logout();
}
