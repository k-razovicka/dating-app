@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body {
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

                        <div class="row">
                            <div class="col-md-3 m-auto col-sm-4">
                                <form method="post" action="{{ route('users.like-user', $user) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-danger" name="liked-user-id"
                                                value="{{ $user->id }}">
                                            <strong>YASS</strong>
                                        </button>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 col-sm-4">

                                @if(substr( $user->profile_picture, 0, 4 ) === "http")
                                    <div class="text-center">
                                        <img style="border-radius: 50%" src="{{$user->getURL()}}" width="260px"
                                             height="260px" alt="image"/>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <img style="border-radius: 50%" src="{{$user->getPicture()}}" width="300px"
                                             height="300px" alt="image"/>
                                    </div>
                                @endif

                                <br>
                                <p class="text-center mb-2" style="font-size: 22px">
                                    <strong>
                                        {{$user->name}},
                                        {{$user->getAge()}}
                                    </strong>
                                </p>
                                <p class="text-center">
                                    <i class="fa fa-map-marker" style="font-size:16px"></i>
                                    {{$user->location}}
                                </p>
                            </div>

                            <div class="col-md-3 m-auto col-sm-4">
                                <form method="post" action="{{ route('users.like-user', $user) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-danger" name="disliked-user-id"
                                                value="{{ $user->id }}">
                                            <strong>NOPE</strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <br>
                        @if($user->description !== null)
                            <strong>Shortly about me:</strong>
                            <br>
                            {{$user->description}}
                            <br><br>
                        @endif
                        @if($user->interested_in !== null)
                            <strong>I'm interested in:</strong>
                            <br>
                            {{$user->interested_in}}
                        @endif
                        <br><br>

                        <a style="color: red;" href="{{ route('pictures', $user) }}"><strong>View Pictures</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

