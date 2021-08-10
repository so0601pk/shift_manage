<?php
require 'vendor/autoload.php';
use Carbon\Carbon;

$dt = Carbon::createFromDate(); //今の時間を取得

function renderCalendar($dt){
    $dt->timezone = 'Asia/Tokyo'; //日本時刻で表示
    echo $dt;
}

renderCalendar($dt);

?>