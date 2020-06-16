@extends('layouts.app')

@section('content')

    <head>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

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

                        <p><strong>Recently Liked Profiles:</strong></p>

                        @if(count($likedUserID) != 0)
                            <div class="row">
                                @foreach($likedUserID as $like)
                                    <div class="col">
                                        <div class="">
                                            @if(substr( $like->profile_picture, 0, 4 ) === "http")

                                                <img style="border-radius: 50%" src="{{$like->getURL()}}" width="80px"
                                                     height="80px" alt="image"/>
                                            @else

                                                <img style="border-radius: 50%" src="{{$like->getPicture()}}"
                                                     width="80px"
                                                     height="80px" alt="image"/>
                                            @endif

                                        </div>
                                        <div class="">
                                            {{$like->name}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br><br>
                        @else
                            No recently liked profiles.. <br><br>
                        @endif

                        <p><strong>Disliked Profiles:</strong></p>
                        @if(count($dislikedUserID) != 0)
                            <div class="row">
                                @foreach($dislikedUserID as $dislike)
                                    <div class="col">
                                        <div class="">
                                            @if(substr( $dislike->profile_picture, 0, 4 ) === "http")

                                                <img style="border-radius: 50%" src="{{$dislike->getURL()}}"
                                                     width="80px"
                                                     height="80px" alt="image"/>
                                            @else

                                                <img style="border-radius: 50%" src="{{$dislike->getPicture()}}"
                                                     width="80px"
                                                     height="80px" alt="image"/>
                                            @endif

                                        </div>
                                        <div class="">
                                            {{$dislike->name}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br><br>
                        @else
                            No recently disliked profiles.. <br><br>
                        @endif

                        @if(count($matches) != 0)
                            <p class="text-center mt-2 mb-5"
                               style="font-size: 25px; color: #d0211c; font-family: 'Pacifico'"><strong>It's a
                                    match!</strong>
                            </p>

                            @foreach($matches as $match)

                                <ul class="pl-0">
                                    <li style="list-style-type: none">
                                        <div class="row">
                                            <div class="col">
                                                @if(substr( $match->profile_picture, 0, 4 ) === "http")

                                                    <img src="{{$match->getURL()}}" width="280px"
                                                         height="300px" alt="image"/>
                                                @else

                                                    <img src="{{$match->getPicture()}}" width="280px"
                                                         height="300px" alt="image"/>
                                                @endif
                                            </div>
                                            <div class="col">
                                                <p style="font-size: 18px; font-weight: bolder">{{$match->name}}
                                                    , {{$match->getAge()}}</p>
                                                <i class="fa fa-map-marker" style="font-size:16px"></i>
                                                {{$user->location}} <br> <br>
                                                {{$match->description}}
                                                <br><br>
                                                <button type="button" class="btn btn-danger"> Let's Chat!</button>
                                            </div>
                                        </div>

                                    </li>
                                </ul>

                            @endforeach

                        @else
                            Sorry, no matches yet.. Be patient!
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

