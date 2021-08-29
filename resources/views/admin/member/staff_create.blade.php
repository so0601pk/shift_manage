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

                    <br>
                    <form method="POST" action="{{ route('admin.candidate_store') }}">
                    @csrf
                        従業員番号
                        <input type="text" name="candidate_name">
                        <br>
                        名前
                        <input type="text" name="begin_time">
                        <br>
                        ふりがな
                        <input type="text" name="end_time">
                        <br>
                        性別
                        <input type="radio" name="gender" value="0">男性
                        <input type="radio" name="gender" value="1">女性
                        <input type="radio" name="gender" value="2">その他
                        <br>
                        職業
                        <select name="profession">
                            <option value="">選択して下さい</option>
                            <option value="1">専業主婦・主婦</option>
                            <option value="2">大学・大学院生</option>
                            <option value="3">専門学校生・短大生</option>
                            <option value="4">高校生</option>
                            <option value="5">フリー</option>
                            <option value="6">60~歳</option>
                        </select>
                        <br>
                        その他
                        <textarea name="contact"></textarea>
                        <input type="submit" class="btn btn-info" value="登録する">
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
