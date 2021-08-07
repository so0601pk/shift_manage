<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //以下の設定でログインしないと見れないページをURLで開いた際にログイン画面へ飛ばしている
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.home');
    }
}
