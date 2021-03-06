@extends('layout/login_header')
@section('title', 'Login')

@section('content')
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ url('/postLogin') }}">
                  @csrf

                    <div class="form-group">
                      <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email...">
                    </div>

                    <div class="form-group">
                      <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password...">             
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ url('register') }}">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
@endsection