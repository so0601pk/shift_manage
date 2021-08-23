<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes(); //Auth::routes(['register' => false]))するとRegisterのリンクがトップ画面上から消え

//ユーザーログイン
Route::namespace('User')->prefix('user')->name('user.')->group(function(){

    //ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    //ログイン認証後
    Route::middleware('auth:user')->group(function(){

        //TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });

});

//ユーザー
Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function(){
    // Route::get('index', 'ContactFormController@index')->name('contact.index');//nameを書くとviewを書くときに楽になる
    // Route::get('create', 'ContactFormController@create')->name('contact.create');
    // Route::post('store', 'ContactFormController@store')->name('contact.store');
    // Route::get('show/{id}', 'ContactFormController@show')->name('contact.show');//詳細なデータをみるときに使う
    // Route::get('edit/{id}', 'ContactFormController@edit')->name('contact.edit');
    // Route::post('update/{id}', 'ContactFormController@update')->name('contact.update');
    // Route::post('destroy/{id}', 'ContactFormController@destroy')->name('contact.destroy');

    Route::get('calendar', 'User\CalendarController@show')->name('user.calendar');
    Route::get('apply', 'User\ApplyController@create')->name('user.apply');
});

Route::get('user.auth.login', 'User\LoginController@login')->name('user.auth.login');


// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });

});

//管理者
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    // Route::get('index', 'ContactFormController@index')->name('contact.index');//nameを書くとviewを書くときに楽になる
    // Route::get('create', 'ContactFormController@create')->name('contact.create');
    // Route::post('store', 'ContactFormController@store')->name('contact.store');
    // Route::get('show/{id}', 'ContactFormController@show')->name('contact.show');//詳細なデータをみるときに使う
    // Route::get('edit/{id}', 'ContactFormController@edit')->name('contact.edit');
    // Route::post('update/{id}', 'ContactFormController@update')->name('contact.update');
    // Route::post('destroy/{id}', 'ContactFormController@destroy')->name('contact.destroy');


    Route::get('top', 'Admin\ShiftManageController@index')->name('admin.top');
    Route::get('calendar', 'Admin\CalendarController@show')->name('admin.calendar');
    Route::get('candidate_index', 'Admin\CandidateController@index')->name('admin.candidate_index');
    Route::get('candidate_create', 'Admin\CandidateController@index')->name('admin.candidate_create');
});

Route::get('admin.auth.login', 'Admin\ShiftManageController@login')->name('admin.auth.login');