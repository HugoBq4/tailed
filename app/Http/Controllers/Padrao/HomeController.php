<?php

namespace App\Http\Controllers\Padrao;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        return json_encode(['index'=> ['logado'=> Auth::check()]]);
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
