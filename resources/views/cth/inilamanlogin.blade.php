<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">

    <!-- TITLE -->
    <title>Login-Sistem Online Laboratorium IPB</title>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700%7CRoboto:400,400i,700" rel="stylesheet">

    <!-- ICONS -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css">

    <!-- LIBRARIES -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .bg {
            background-image: url('img/bg_login.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-wrp {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            background: rgba(255, 255, 255, 255);
            border-radius: 10px;
            margin-left: 890px;
        }

        .login-form .form-group {
            margin-bottom: 15px;
        }

        .login-form .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .btn-block {
            background-color: #4535B1;
            color: white;
            border-radius: 5px;
            padding: 10px;
        }

        .btn-block:hover {
            background-color: #2d3e73;
            color: #ffffff;
        }

        .checkbox-inline {
            font-size: 0.85em;
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="login-wrp">
            <div class="top text-center" style="margin-bottom: 10px;">
                <div class="logo">
                    <img src="img/logo_login.png" alt="" width="300px">
                </div>
            </div>
            <div class="bottom mt-4">
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="" class="login-form mt-4" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" value="{{ old('email') }}" class="form-control" placeholder="Email" aria-label="email" name="email" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" aria-label="password" name="password" aria-describedby="basic-addon1">
                        </div>
                        <button type="submit" class="btn btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>