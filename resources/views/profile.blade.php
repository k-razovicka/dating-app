@extends('layouts.app')

@section('content')
    <style>
        body{
            background: linear-gradient(to left, #8942a8, #ba382f);
        }
        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #d0211c;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #d0211c;
            cursor: pointer;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <img  src="{{$user->getPicture()}}" width="100%"
                                             height="50%" alt="image"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="picture">Choose Picture</label>
                                        <input type="file" class="form-control-file" id="picture" name="picture">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description: </label>
                                        <textarea class="form-control" id="description" rows="2" maxlength="200"
                                                  name="description">{{ old('description', $user->description) }}</textarea>
                                        max length: 200 characters
                                    </div>
                                </div>

                                <div class="col">

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name"
                                               name="name" value="{{ old('name', $user->name) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" class="form-control" id="last-name"
                                               name="last-name" value="{{ old('last-name', $user->last_name) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <select id="location" name="location" class="form-control">
                                            @foreach(App\Http\Utilities\Cities::all() as $city)
                                                <option value="{{$city}}">{{$city}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <p>Interested in: </p>
                                    <div class="form-check">
                                        @if($user->interested_in == 'female')
                                            <input class="form-check-input" type="checkbox" value="female" id="female"
                                                   name="interested_in" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" value="female" id="female"
                                                   name="interested_in">
                                        @endif
                                        <label class="form-check-label" for="female">
                                            female
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        @if($user->interested_in == 'male')
                                            <input class="form-check-input" type="checkbox" value="male" id="male"
                                                   name="interested_in" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" value="male" id="male"
                                                   name="interested_in">
                                        @endif
                                        <label class="form-check-label" for="male">
                                            male
                                        </label>
                                    </div>


                                    <div class="form-check">
                                        @if($user->interested_in == 'both' || $user->interested_in == null)
                                            <input class="form-check-input" type="checkbox" value="both" id="both"
                                                   name="interested_in" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" value="both" id="both"
                                                   name="interested_in">
                                        @endif
                                        <label class="form-check-label" for="both">
                                            both
                                        </label>
                                    </div>

                                    <div class="slidecontainer">
                                        <p>Interested min age: <span id="min"></span></p>
                                        <input name="min" type="range" min="18" max="40"
                                               value="{{ old('min', $user->interested_min_age_range) }}" class="slider"
                                               id="minRange">
                                    </div>

                                    <div class="slidecontainer">
                                        <p>Interested max age: <span id="max"></span></p>
                                        <input name="max" type="range" min="41" max="90"
                                               value="{{ old('max', $user->interested_max_age_range) }}" class="slider"
                                               id="maxRange">
                                    </div>

                                    <button type="submit" class="btn btn-danger mt-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var slider = document.getElementById("minRange");
        var slider2 = document.getElementById("maxRange");
        var output = document.getElementById("min");
        var output2 = document.getElementById("max");
        output.innerHTML = slider.value;
        output2.innerHTML = slider2.value;

        slider.oninput = function () {
            output.innerHTML = this.value;
        }
        slider2.oninput = function () {
            output2.innerHTML = this.value;
        }
    </script>
@endsection

