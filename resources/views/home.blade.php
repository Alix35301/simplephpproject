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

                   <a href="/questionnaires/create" class="btn btn-dark">Create New Questionnaire</a>
                </div>


            </div>

            <div class="card mt-3">
                <div class="card-header">My Questionnaires</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                            <li class="list-group-item">
                                <a href="{{$questionnaire->path()}}">{{$questionnaire->title}}</a>
                                <div class="mt-2">
                                    <small>Share URL</small>
                                    <p>
                                        <a href="{{$questionnaire->publicpath()}}">{{$questionnaire->publicpath()}}</a>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
