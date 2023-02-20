<?php

namespace App\Http\Controllers\Padrao;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Util\Texto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function create()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('padrao.register');
    }

    public function store(Request $request)
    {
        $message = array();
        $name = trim($request->name);
        $email = trim($request->email);
        $password = $request->password;

        if ($request->politic != '1' && $request->politic != 'on') {
            $message[] = ['politic' => 'Politica de privacidade deve ser autorizada pelo usuário'];
        }

        if (Texto::verificaCaracteresIlegais($name)) {
            $message[] = ['name' => 'Insira um nick válido'];
        }
        if (strlen($name) > 20) {
            $message[] = ['name' => 'Nick não deve ser maior que 20 caracteres'];
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 50){
            $message[] = ['email' => 'Insira um email válido'];
        }elseif((User::where('email', 'like', $email)->get()->first() != null)){
            $message[] = ['email' => 'Este email ja está sendo usado por outro usuário'];
        }
        if(strlen($password) < 8){
            $message[] = ['password' => 'Senha deve possuir no mínimo 8 caracteres'];
        }
        if(strlen($password) > 20){
            $message[] = ['password' => 'Senha deve possuir no máximo 20 caracteres'];
        }
        if(!preg_match('#[A-Z]+#', $password)){
            $message[] = ['password' => 'Senha deve possuir uma letra maiúscula'];
            $message[] = ['confirmPassword' => ''];
        }
        if(!preg_match('#[a-z]+#', $password)){
            $message[] = ['password' => 'Senha deve possuir uma letra minúscula'];
            $message[] = ['confirmPassword' => ''];
        }
        if(!preg_match('#\d+#', $password)){
            $message[] = ['password' => 'Senha deve possuir um número'];
            $message[] = ['confirmPassword' => ''];
        }
        if($password !== $request->confirmPassword){
            $message[] = ['confirmPassword' => 'Confirmação de senha incorreta'];
        }

        if($message === []){
            $status = 'success';
        }else{
            $status = 'error';
        }

//        $user = new User();
//        $user->name = 'Horo';
//        $user->password = md5('12645a');
//        $user->type_user = 1;
//        $user->birthday = '2000-08-02';
//        $user->email = 'victorhugosens@live.com';
//        $user->cellphone = '47999698884';
//        $user->save();
//
//        auth()->login($user);

        return json_encode(['status' => $status, 'message' => $message]);
    }


}