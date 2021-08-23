@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.candidate_create')}}">
                        <button type="submit" class="btn btn-primary">
                            新規登録
                        </button>
                    </form>
                    <!-- <form methid="GET" action="{{ route('contact.index') }}" class="d-flex">
                        <input class="form-control me-2" name="serch" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                    candidateです。

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">シフト記号</th>
                                <th scope="col">勤務時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidates as $candidate)
                            <tr>
                                <th>{{$candidate->candidate_id}}</th>
                                <td>{{$candidate->candidate_time}}</td>
                                <!-- <td><a href="{{ route('contact.show',['id' => $contact->id ]) }}">詳細をみる</a></td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection