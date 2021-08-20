<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//CalendarViewクラスを使用するので読み込む
use App\Calendar\CalendarView;

class CalendarController extends Controller
{
    //
    public function show(){

		$calendar = new CalendarView(time());

		return view('admin.calendar', [
			"calendar" => $calendar
			//viewへ作成したcalendarviewオブジェクトを渡す
		]);
	}
}
