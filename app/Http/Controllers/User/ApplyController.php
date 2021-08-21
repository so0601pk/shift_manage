<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    //
    public function create(){

		return view('user.apply');
	}
}
