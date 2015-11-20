<?php

namespace App;

/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-11-19
 * Time: 11:58 PM
 */
use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}