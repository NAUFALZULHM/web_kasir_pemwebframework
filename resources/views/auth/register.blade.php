<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Register</title>

  <!-- Styles -->
  <link rel="stylesheet" href="/vendor/admin/admin/dist/css/adminlte.min.css">
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
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="/register" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}">
          @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Password">
          @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Register</button>

        <div class="text-center mt-3">
          <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
