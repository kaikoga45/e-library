<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp Dashboard</title>

    <!-- Site favicon -->
    <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('vendors/styles/style.css')}}">

</head>

<body>
    <div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
        <div class="login-box bg-white box-shadow pd-30 border-radius-5">
            <h2 class="text-center mb-30">Login</h2>
            @if (session('loginFailed'))
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session('loginFailed') }}!</strong>
            </div>
            @endif
            @if (session('logoutSuccess'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session('logoutSuccess') }}!</strong>
            </div>
            @endif
            <form action="/postLogin" method="POST">
                {{csrf_field()}}
                <div class="input-group custom input-group-lg">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="input-group custom input-group-lg">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <button class="btn btn-outline-primary btn-lg btn-block" type="submit">Sign In</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('vendors/scripts/script.js')}}"></script>
</body>

</html>