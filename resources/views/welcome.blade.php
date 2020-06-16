<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Matches | Find You Match</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            /*background-color: #fff;*/
            /*background: linear-gradient(to left, #8942a8, #ba382f);*/
            background-image: url('https://www.letsnurture.com/wp-content/uploads/2018/06/tinder_banner.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 75px;
            font-weight: 600;
            color: #fff;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Are You ready to find your MATCH?
        </div>

        <div>
            <a href="{{ route('login') }}">
                <button type="button" class="btn btn-danger btn-lg mr-3">LOGIN</button>
            </a>
            <a href="{{ route('register') }}">
                <button type="button" class="btn btn-danger btn-lg ml-3">REGISTER</button>
            </a>
        </div>

    </div>

</div>
</body>
</html>
