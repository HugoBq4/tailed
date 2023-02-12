<?php

namespace App\Http\Controllers\Padrao;

use App\Models\User;

class HomeController
{
    public function index()
    {
        return 'index';
    }

    public function login(){
        return 'login';
    }

    public function submitLogin(){
        return 'submit';
    }

    public function logout(){
        return 'logout';
    }

    public function privacidade(){
        return 'logout';
    }
}
