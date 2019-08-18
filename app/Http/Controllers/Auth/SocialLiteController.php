<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;

class SocialLiteController extends Controller
{
    public function signin()
    {
        return view('auth/signin');
    }

    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback($social)
    {
        //ソーシャルサービス（情報）を取得
        $userSocial = Socialite::driver($social)->stateless()->user();
        //emailで登録を調べる
        $user = User::where(['email' => $userSocial->getId()])->first();

        //登録（email）の有無で分岐
        if($user){

            //登録あればそのままログイン（2回目以降）
            Auth::login($user);
            return redirect('/post');

        }else{

            //なければ登録（初回）
            $newuser = new User;
            $newuser->name = $userSocial->getName();
            $newuser->email = $userSocial->getId();
            $newuser->save();

            //そのままログイン
            Auth::login($newuser);
            return redirect('/post');
        }
    }
}