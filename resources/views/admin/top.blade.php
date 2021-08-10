<?php
//require 'vendor/autoload.php';
use Carbon\Carbon;

$dt = Carbon::createFromDate(); //今の時間を取得
renderCalendar($dt);

function renderCalendar($dt){
    $dt->startOfMonth(); //今月の最初の日
    $dt->timezone = 'Asia/Tokyo'; //日本時刻で表示
    echo $dt;

    //曜日の配列作成
    $headings = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saterday','Sunday'];

    $calendar = '<table class="table" border=1>';
    $calendar .= '<thead >';
    foreach($headings as $heading){
    $calendar .= '<th class="header">'.$heading.'</th>';
    }
    $calendar .= '</thead>';
    $calendar .= '</table>';
    echo $calendar;
}

?>