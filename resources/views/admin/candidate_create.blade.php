@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    createです。
                    <br>
                    <form method="POST" action="#">
                    @csrf
                        氏名
                        <input type="text" name="your_name">
                        <br>
                        件名
                        <input type="text" name="title">
                        <br>
                        メールアドレス
                        <input type="email" name="email">
                        <br>
                        ホームページ
                        <input type="url" name="url">
                        <br>
                        性別
                        <input type="radio" name="gender" value="0">男性
                        <input type="radio" name="gender" value="1">女性
                        <br>
                        年齢
                        <select name="age">
                        <option value="">選択して下さい</option>
                        <option value="1">~19歳</option>
                        <option value="2">20~29歳</option>
                        <option value="3">30~39歳</option>
                        <option value="4">40~49歳</option>
                        <option value="5">50~59歳</option>
                        <option value="6">60~歳</option>
                        </select>
                        <br>

                        <input type="submit" class="btn btn-info" value="登録する">
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
