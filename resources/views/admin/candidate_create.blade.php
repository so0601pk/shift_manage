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
                        <input type="text" name="candidate_name">
                        <br>
                        勤務時間
                        <input type="text" name="candidate">
                        <br>
                        <input type="submit" class="btn btn-info" value="登録する">
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
