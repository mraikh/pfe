@extends('layout')
@section('content')
<div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

{{--                  <img src="{{asset('fonts/img/logo.png')}} " class="img-xs rounded-circle">--}}


              <!-- End Logo -->

              <div class="card mb-3 bg-light">

                <div class="card-body">

                  <div class="pt-2 ">
                    <h5 class="card-title text-center pb-0 ">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col-12">
                        <label for="yourUsername" class="form-label">email</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="text" name="email" class="form-control" required>
                          <div class="invalid-feedback">Please enter your email.</div>
                        </div>
                    </div>
                    <div class="col-12">
                      <label for="Password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="Password" required autocomplete="current-password">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>


                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  <script src="{{asset('assets/js/main.js')}} "></script>
@endsection
