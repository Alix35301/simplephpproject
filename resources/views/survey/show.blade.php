@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{$questionnaire->title}}</h1>

                <form action="/surveys/{{$questionnaire->id}}-{{$questionnaire->title}}" method="post">
                    @csrf

                    @foreach($questionnaire->questions as $key => $question)

                        <div class="card mt-4">
                            <div class="card-header"><strong>{{$key+1}} </strong>{{ $question->question }}</div>
                            <div class="card-body">
                                @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                <ul class="list-group">

                                    @foreach($question->answers as $answer)
                                        <label for="answer{{$answer->id}}">
                                            <li class="list-group-item">
                                                <input type="radio" id="answer{{ $answer->id}}"
                                                       name="responses[{{$key}}][answer_id]"
                                                       class="mr-2" value="{{$answer->id}}"
                                                    {{old('responses.' . $key . '.answer_id')==$answer->id ? 'checked' : '' }}> {{$answer->answer}}
                                                <input type="hidden" name="responses[{{$key}}][question_id]"
                                                       value="{{$question->id}}">
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    <div class="card mt-2">
                        <div class="card-header">Your Information</div>

                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="name"
                                       placeholder="Enter Your Name"
                                       value= {{old('name')}}>
                                <small id="name" class="form-text text-muted">Whats your name? :)</small>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="survey[email]" type="email" class="form-control" id="email"
                                       aria-describedby="email" placeholder="Whats your email"
                                       value={{old('email')}}>
                                <small id="emailHelp" class="form-text text-muted">give us an email</small>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div>
                        <button class="btn btn-dark mt-2" type="submit">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
