<?php

namespace App\Http\Controllers\Padrao;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('padrao.home');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('padrao.login');
    }

    public function submitLogin(Request $request)
    {
        if (Auth::check()) {
            return abort(419);
        }

        $message = array();
        $status = 'error';
        if (filter_var($request->login, FILTER_VALIDATE_EMAIL)) {
            $user = User::where(DB::raw('BINARY `email`'), $request->login)->get()->first();
        } else {
            $user = User::where(DB::raw('BINARY `name`'), $request->login)->get()->first();
        }
        $user = password_verify($request->password, optional($user)->getAuthPassword()) ? $user : false;
        if ($user != null) {
            auth()->login($user);
            $status = 'success';
        } else {
            $message[] = ['login' => 'Usuário ou senha inválida'];
            $message[] = ['password' => ''];
        }
        return json_encode(['status' => $status, 'message' => $message]);
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect(route('home'));
        } else {
            return abort(419);
        }
    }

    public function resetDB()
    {
        if (Auth::user()->type_user == 1) {
            Artisan::call('migrate:fresh');
        }

        return redirect()->route('home');
    }

    public function optimize()
    {
//        if(Auth::user()->type_user == 1) {
        Artisan::call('optimize');
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        dd('limpinho');
//        }
    }

    public function privacidade()
    {
        return 'logout';
    }
}
