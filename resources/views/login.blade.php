<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/accesories.css">
    <link rel="stylesheet" href="CSS/login&regisImage.css">
    <title>{{$title}}</title>
</head>
<body id="login">
<div class="container-login">
  <table class="table-login">
    <tr>
      <td>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        @if (session('loginError'))
        <div class="alert alert-danger" role="alert">
          {{ session('loginError') }}
        </div>
        @endif
      </td>
    </tr>
    <tr>
      <td style="width: 50%; margin:auto"><h1 class="form-title">Log in.</h1></td>
      <td><span class="logo-name"><img src="{{asset('images/keynlock-logo.png')}}" alt="Logo" style="width:100%"></span></td>
    </tr>
    <tr>
      <td colspan="2" class="login-row">
        <p class="form-para">Please input your information in the field below to enter Key n Lock</p>
      </td>
    </tr>
  </table>
  <hr>
  <table class="table-login">
    <form action="/login" method="post">
      @csrf
    <tr>
      <td><div class="user-input-box-login">
        <label>Account</label><br>
        <input type="email"
               id="email"
               name="email"
               value="{{old('email')}}"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="Email" autofocus required>
        @error('email')
          <p class="p-error">{{$message}}</p>
        @enderror
        <input type="password"
               id="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Password" required>
        @error('password')
          <p class="p-error">{{$message}}</p>
        @enderror
          </div>
      </td>
    </tr>
  </table>
  <hr>
  <table class="table-login">
    <tr>
      <td colspan="2" class="login-row">
        <div class="user-input-box-submit-login">
          <input class="btn btn-submit2" type="submit" value="Login">
        </div>
      </td>
    </tr>
  </table>
  <table class="table-login" style="margin-top:20px">
    <tr>
      <td id="regisHere">
        <p id="regisHere">Not having an account yet?</p>
        <a href="/register">Register here</a>
      </td>
    </tr>
  </table>
</div>
</body>
</html>

