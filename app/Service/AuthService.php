<?php

namespace App\Service;

use App\Contract\AuthContract;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthContract
{
    public function login(array $credentials)
    {
        try {

            $query = User::where('email', $credentials['email']);
            $user = $query->first();

            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                throw new Exception("Invalid Credentials");
            }

            $token = Auth::guard('api')->attempt($credentials);

            if (!$token) {
                throw new Exception("Invalid Credentials");
            }

            $query->update(['fcm_id' => $credentials['fcm_id']]);

            return [
                "token" => $token,
                "expired_in" => Auth::guard('api')->factory()->getTTL() * 60,
            ];
        } catch (Exception $exception) {
            return $exception;
        }
    }



    public function logout()
    {
        try {
            Auth::guard('api')->logout();
            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
