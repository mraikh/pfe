<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">k-acdemy</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{('/')}}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href={{('about')}} class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
            <a href={{('courses')}} class="nav-item nav-link {{ request()->is('courses') ? 'active' : '' }}">courses</a>
            <a href={{('contact')}} class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">contact</a>

        </div>

        @if (Route::has('login'))
            <div class="">
                @auth
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <li class="nav-item dropdown pe-5">

                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
{{--                                <img src={{asset('fonts/img/logo.png')}}  class="rounded-circle">--}}
                                <span class=" dropdown-toggle ps-2">{{Auth::user()->name}}</span>
                            </a><!-- End Profile Iamge Icon -->
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6>{{Auth::user()->name}}</h6>
                                    <span>prof</span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form method="GET" action="{{ route('formateur.profile') }}">

                                    <x-dropdown-link :href="route('formateur.profile')"
                                                     onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('my profile') }}
                                    </x-dropdown-link></form>


                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link></form></ul>
                        </li></ul>
                    </div>
                @else
                    <div class="d-md-flex justify-content-md-end">
                    <a href="/login" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block ">sing in</a>

                    @if (Route::has('register'))
                        <a href="/register" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">sing up</a>
                    @endif
                    </div>
                @endauth

            </div>
        @endif

    </div>
</nav>
