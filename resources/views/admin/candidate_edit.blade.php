@extends('layouts.app')

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
                    editです。
                    <br>
                    <form method="POST" action="#">
                    @csrf
                        シフト記号
                        <input type="text" name="your_name" value="{{ $candidate->candidate_name }}">
                        <br>
                        勤務開始時間
                        <input type="text" name="title" value="{{ $candidate->begin_time }}">
                        <br>
                        勤務終了時間
                        <input type="email" name="email" value="{{ $candidate->end_time }}">
                        <br>
                        休憩時間
                        <input type="url" name="url" value="{{ $candidate->rest_time }}">
                        <br>

                        <input type="submit" class="btn btn-success" value="更新する">
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
