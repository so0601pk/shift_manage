@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">従業員一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.member.staff_create') }}">
                        <button type="submit" class="btn btn-primary">
                            新規従業員登録
                        </button>
                    </form>
                    <!-- <form methid="GET" action="#" class="d-flex">
                        <input class="form-control me-2" name="serch" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">従業員番号</th>
                                <th scope="col">名前</th>
                                <th scope="col">ふりがな</th>
                                <th scope="col">性別</th>
                                <th scope="col">職業</th>
                                <th scope="col">登録日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staffs as $staff)
                            <tr>
                                <th>{{$staff->staff_number}}</th>
                                <th>{{$staff->name}}</th>
                                <td>{{$staff->furigana}}</td>
                                <td>{{$staff->profession}}</td>
                                <td>{{$staff->gender}}</td>
                                <td>{{$staff->created_at}}</td>
                                <td class="staff"><style>.staff{display: flex;}</style>
                                    <form action="#">
                                    @csrf
                                        <input type="submit" class="btn btn-success" value="編集する">
                                    </form>
                                    <form method="POST" action="#" id="delete_{{ $staff->id }}">
                                    @csrf
                                        <a href="#" class="btn btn-danger" data-id="{{ $staff->id }}" onclick="deletePost(this);" >削除する</a>
                                    </form>
                                    <style>.btn-danger{margin-left: 10px;}</style>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
<!--
/************************************
削除ボタンを押してすぐにレコードが削除
されるのも問題なので、一旦javascriptで
確認メッセージを流します。
*************************************/
//-->
function deletePost(e) {
    'use strict';
    if (confirm('本当に削除していいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>

@endsection