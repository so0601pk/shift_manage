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
                    editです。
                    <br>
                    <form method="POST" action="{{ route('admin.candidate_update', ['id' => $candidate->id ]) }}">
                    @csrf
                        シフト記号
                        <input type="text" name="candidate_name" value="{{ $candidate->candidate_name }}">
                        <br>
                        勤務開始時間
                        <input type="text" name="begin_time" value="{{ $candidate->begin_time }}">
                        <br>
                        勤務終了時間
                        <input type="text" name="end_time" value="{{ $candidate->end_time }}">
                        <br>
                        休憩時間
                        <input type="text" name="rest_time" value="{{ $candidate->rest_time }}">
                        <br>

                        <input type="submit" class="btn btn-success" value="更新する">
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
