@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">シフト候補</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.candidate_create')}}">
                        <button type="submit" class="btn btn-primary">
                            新規シフト候補登録
                        </button>
                    </form>
                    <!-- <form methid="GET" action="#" class="d-flex">
                        <input class="form-control me-2" name="serch" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">シフト記号</th>
                                <th scope="col">勤務開始時間</th>
                                <th scope="col">勤務終了時間</th>
                                <th scope="col">休憩時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidates as $candidate)
                            <tr>
                                <th>{{$candidate->candidate_name}}</th>
                                <td>{{$candidate->begin_time}}</td>
                                <td>{{$candidate->end_time}}</td>
                                <td>{{$candidate->rest_time}}</td>
                                <td>
                                    <form action="{{ route('admin.candidate_edit', [ 'id' => $candidate->id ]) }}">
                                    @csrf
                                        <input type="submit" class="btn btn-success" value="編集する">
                                    </form>
                                    <form method="POST" action="{{ route('admin.candidate_destroy', ['id' => $candidate->id ])}}" id="delete_{{ $candidate->id }}">
                                    @csrf
                                        <a href="#" class="btn btn-danger" data-id="{{ $candidate->id }}" onclick="deletePost(this);" >削除する</a>
                                    </form>
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