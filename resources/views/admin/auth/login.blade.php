<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/vendor/admin/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/vendor/admin/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/vendor/admin/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/vendor/admin/admin/index2.html"><b>Cash</b>Flow</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      
        @if (session()->has('loginError'))
            <div class="alert alert-danger">{{ session('loginError') }}</div>
        @endif
      <form action="/login/todashboard" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
        
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/vendor/admin/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/vendor/admin/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/vendor/admin/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
