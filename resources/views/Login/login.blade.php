<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Database Parkir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        @if (session()->has('loginError'))
        <div style="width: 35%" id="danger-alert" class="alert alert-danger alert-dismissible fade show fixed-top z-index-1 my-3 mx-auto" role="alert">{{ session('loginError') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif
        <div class="login-dark">
            <form class="one"  method="post" action="/postlogin">
                {{ csrf_field() }}
                <h2><center>Login</center></h2>
                <h6><center>Data Base Parkiran ITS</center></h6>
                <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                <div id="loginbtn" class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button>
                <div class="mt-3 divider"><center>---------------or---------------</center></div>
            </form>
            <form method="GET" action="/dashboard/member">
                <div class="form-group my-3"><input class="form-control" type="search" name="search" placeholder="Nomor Kartu"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Find</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

</body>

</html>
