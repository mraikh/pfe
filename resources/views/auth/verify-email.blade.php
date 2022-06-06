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
                                <img src="{{asset('img/6.png')}}" class="col-lg-12  d-lg-block" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
{{--                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>--}}
                                    </div>
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                    </div>
                                    @if (session('status') == 'verification-link-sent')
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                        </div>
                                    @endif
                                    <div class="mt-4 flex items-center justify-between">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <div>
                                                <button type="submit" class="btn btn-secondary mb-2">
                                                    {{ __('Resend Verification Email') }}
                                                </button>
                                            </div>
                                        </form>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button type="submit" class="btn btn-outline-primary">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
