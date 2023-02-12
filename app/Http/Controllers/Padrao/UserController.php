<?php

namespace App\Http\Controllers\Padrao;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Util\Texto;

class UserController
{
    public function create()
    {
        return view('padrao.register');
    }

    public function store(RegisterRequest $request)
    {
        $status = 'success';
        $message = array();

        if($request->politic != '1'){
            $status = 'error';
            $message[] = ['politic' => 'Politica de privacidade deve ser autorizada pelo usuário'];
        }

        $name = $request->name;
        if (empty($name)) {
            $status = 'error';
            $message[] = ['name' => 'Nome não deve ser vazio'];
        }elseif(Texto::verificaCaracteresIlegais($name)){
            $status = 'error';
            $message[] = ['name' => 'Nome não deve possuir caracteres especiais'];
        }

        $user = new User();
        $user->name = 'Horo';
        $user->password = md5('12645a');
        $user->type_user = 1;
        $user->birthday = '2000-08-02';
        $user->email = 'victorhugosens@live.com';
        $user->cellphone = '47999698884';
        $user->save();

        auth()->login($user);

        return json_encode(['status' => $status, 'message' => $message]);
    }


}
