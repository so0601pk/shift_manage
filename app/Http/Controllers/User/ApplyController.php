<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//DBファサード使用のために記述
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    //
    public function create(){

		return view('user.apply');
	}
}
