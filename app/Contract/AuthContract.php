<?php

interface AuthContract
{
    public function login(array $credentials);
    public function logout();
}
