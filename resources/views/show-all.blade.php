@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background: linear-gradient(to left, #8942a8, #ba382f);
            }
        </style>
    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($users as $user)

                            <ul>
                                <li style="list-style-type: none">
                                    <div class="row">
                                        @if(substr( $user->profile_picture, 0, 4 ) === "http")
                                            <div class="col">
                                                <img src="{{$user->getURL()}}" width="280px"
                                                     height="300px" alt="image"/>
                                            </div>

                                        @else
                                            <div class="col">
                                                <img src="{{$user->getPicture()}}" width="280px"
                                                     height="300px" alt="image"/>
                                            </div>
                                        @endif

                                        <div class="col">
                                            <a href="{{ route('users.show-user', $user) }}">
                                                {{$user->name}},
                                                {{$user->getAge()}} <br>
                                            </a>
                                            <i class="fa fa-map-marker" style="font-size:16px"></i>
                                            {{$user->location}}<br><br>
                                            {{$user->description}} <br><br>
                                            {{$user->sex}} <br><br>
                                        </div>
                                    </div>
                                </li>
                            </ul> <br><br>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
