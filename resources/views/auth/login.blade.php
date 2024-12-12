<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>

  <!-- Styles -->
  <link rel="stylesheet" href="/vendor/admin/admin/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  

  <div class="card">
    <div class="d-flex justify-content-center align-items-center text-secondary">
      <h2><b>Cash</b>Flow</h2>
    </div>
    <div class="logo">
      <img src="./images/logo.jpg" class="img-fluid w-25 rounded mx-auto d-block m-2" alt="...">
    </div>
    {{-- <div class="img" ><img src="./images/logo.jpg" class="rounded mx-auto d-block justify" alt="..."></div> --}}
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
