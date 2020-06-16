@extends('layouts.app')
<head>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url('https://www.letsnurture.com/wp-content/uploads/2018/06/tinder_banner.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form-label{
            color: white;
            font-size: 16px !important;
        }
    </style>

</head>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: transparent;border: 2px solid white">

                    <div class="card-body">
                        <p class="text-center mt-3" style="color: white; font-size: 30px; font-weight: bolder">LET'S FIND YOU A MATCH!</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right form-label" >{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right form-label">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last name') is-invalid @enderror" name="last_name"
                                           value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                    @error('last name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday"
                                       class="col-md-4 col-form-label text-md-right form-label">{{ __('Birthday') }}</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date" max="2002-12-31" class="form-control"
                                           name="birthday">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sex"
                                       class="col-md-4 col-form-label text-md-right form-label">{{ __('Select Gender:') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="sex" name="sex">
                                        <option>female</option>
                                        <option>male</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right form-label">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
