@extends('layouts.admin.app')

@section('content')

<?php
//require 'vendor/autoload.php';
use Carbon\Carbon;

$dt = Carbon::createFromDate(); //今の時間を取得
$m = isset($_GET['m'])? htmlspecialchars($_GET['m'], ENT_QUOTES, 'utf-8') : '';
$y = isset($_GET['y'])? htmlspecialchars($_GET['y'], ENT_QUOTES, 'utf-8') : '';
    if($m!=''||$y!=''){
        $dt = Carbon::createFromDate($y,$m,01);
    }else{
        $dt = Carbon::createFromDate();
    }
renderCalendar($dt);

function renderCalendar($dt){
    $dt->startOfMonth(); //今月の最初の日
    $dt->timezone = 'Asia/Tokyo'; //日本時刻で表示
    //echo $dt;

    //1ヶ月前
    $sub = Carbon::createFromDate($dt->year,$dt->month,$dt->day);
    $subMonth = $sub->subMonth();
    $subY = $subMonth->year;
    $subM = $subMonth->month;

    //1ヶ月後
    //1ヶ月後
    $add = Carbon::createFromDate($dt->year,$dt->month,$dt->day);
    $addMonth = $add->addMonth();
    $addY = $addMonth->year;
    $addM = $addMonth->month;

    //【リンク】
    //前月のリンク
    $title = '<caption><a href="./calendar.php?y='.$subY.'&&m='.$subM.'"><<前月 </a>';
    //月と年を表示
    $title .= $dt->format('F Y');
    //来月リンク
    $title .= '<a href="./calendar.php?y='.$addY.'&&m='.$addM.'"> 来月>></a></caption>';

    //曜日の配列作成
    $headings = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saterday','Sunday'];

    $calendar = '<table class="table" border=1>';
    $calendar .= '<thead >';
    foreach($headings as $heading){
    $calendar .= '<th class="header">'.$heading.'</th>';
    }
    $calendar .= '</thead>';

    $calendar .= '<tbody><tr>';

    //今月は何日まであるか
    $daysInMonth = $dt->daysInMonth;

    for ($i = 1; $i <= $daysInMonth; $i++) {
        if($i==1){
            if ($dt->format('N')!= 1) {
            $calendar .= '<td colspan="'.($dt->format('N')-1).'"></td>'; //1日が月曜じゃない場合はcolspanでその分あける
            }
        }

        if($dt->format('N') == 1){
            $calendar .= '</tr><tr>'; //月曜日だったら改行
        }

    $calendar .= '<td class="day">'.$dt->day.'</td>';
    $dt->addDay();
    }

    $calendar .= '</tr></tbody>';

    $calendar .= '</table>';
    //echo $calendar;
    echo $title.$calendar;
}

?>

@endsection