<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShiftManageController extends Controller
{
    //ログイン
    public function login(){
        return view('admin.auth.login');
    }

    //トップページ
    public function index(){
        return view('admin.top');
    }
}
