<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>

  <!-- Styles -->
  <link rel="stylesheet" href="/vendor/admin/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Cash</b>Flow</a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      @if (session()->has('loginError'))
          <div class="alert alert-danger">{{ session('loginError') }}</div>
      @endif

      <form action="/login/todashboard" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}">
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

        <div class="text-center mt-3">
          <a href="{{ route('register') }}">Don't have an account? Register</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>