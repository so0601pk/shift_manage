<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    //ログイン
    public function login(){
        return view('user.auth.login');
    }
}
