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
                        シフト記号
                        <input type="text" name="candidate_name" placeholder="早A">
                        <br>
                        勤務開始時刻
                        <input type="text" name="candidate" placeholder="09:00">
                        <br>
                        勤務終了時刻
                        <input type="text" name="candidate" placeholder="18:30">
                        <br>
                        休憩時間
                        <input type="text" name="candidate" placeholder="1:00">
                        <br>
                        <input type="submit" class="btn btn-info" value="登録する">
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
