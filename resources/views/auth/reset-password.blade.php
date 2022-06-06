@extends('layout')
@section('content')
    <div class="container" x-data="{role_id: 1}">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{asset('img/5.png')}}" class="col-lg-12  d-lg-block" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <!-- Email Address -->
                                        <div>
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" value="{{old('email', $request->email)}}" required>
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <label for="password" value="{{__('Password')}}">Password</label>
                                            <input type="password" name="password" id="password" class="">
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <label for="password_confirmation" value="{{__('Confirm Password')}}">Confirm Password</label>

                                            <input type="password" id="password_confirmation" name="password_confirmation" required>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <button class="btn btn-primary" type="submit">Reset Password</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
