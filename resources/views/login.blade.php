<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/custom.css') }}">
    <title>Login Admin</title>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            Admin
        </div>
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form method="post" action="">
                @csrf
              <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember_me">
                        <label for="remember"> Remember Me </label>
                      </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('backend/dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>
</html>