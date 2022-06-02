@extends('layout')
@section('content')
{{-- register form--}}
<div class="container" x-data="{role_id: 1}">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img src="{{asset('img/Taking notes-amico.png')}}" class="col-lg-12  d-lg-block" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Full Name</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="name" class="form-control" required>
                                            <div class="invalid-feedback">Please enter your name.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="email" class="form-control" required>
                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <label for="role" class="form-label">role</label>
                                        <select x-model="role_id" type="password" name="role" class="form-select" id="role" required>
                                            <option value="1" class="form-select-sm">Teacher</option>
                                            <option value="2" class="form-select-sm">Student</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your role!</div>
                                    </div>

                                    <div x-show="role_id == 1" class="col-12">
                                        <label for="specialite" class="form-label">specialite</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="specialite" class="form-control" :required="role_id == 1" >
                                            <div class="invalid-feedback">Please enter your specialite.</div>
                                        </div>
                                    </div>

                                    <div x-show="role_id == 1" class="col-12">
                                        <label for="biography" class="form-label">biography</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="biography" class="form-control" :required="role_id == 1">
                                            <div class="invalid-feedback">Please enter your biography.</div>
                                        </div>
                                    </div>

                                    <div x-show="role_id == 2" class="col-12">
                                        <label for="niveau" class="form-label">Niveau</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="niveau" class="form-control" :required="role_id == 2" >
                                            <div class="invalid-feedback">Please enter your niveau.</div>
                                        </div>
                                    </div>

                                    <div x-show="role_id == 2" class="col-12">
                                        <label for="ecole" class="form-label">ecole</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="ecole" class="form-control" :required="role_id == 2">
                                            <div class="invalid-feedback">Please enter your ecole.</div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <label for="Password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="Password" required autocomplete="current-password">
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="current-password">
                                        <div class="invalid-feedback">Please renter your password!</div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <button class="btn btn-primary w-100" type="submit">Register</button>
                                    </div>

                                    <div class="col-12">
                                        <p class="small mb-0">You already have an account? <a href="{{ route('login') }}">login</a></p>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
     <script src="{{asset('js/app.js')}} "></script>
@endsection

