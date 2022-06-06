@extends('layout')
@section('content')
    <div class="container" >
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{asset('img/8.png')}}" class="col-lg-12  d-lg-block" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                    </div>
                                    <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <!-- Email Address -->
                                        <div>
                                            <label for="email" value="Email" class="form-label">Email</label>
                                            <input type="email" value="" name="email" required>
{{--                                            <x-label for="email" :value="__('Email')" />--}}

{{--                                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    {{ __('Email Password Reset Link') }}
                                                </button>
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
