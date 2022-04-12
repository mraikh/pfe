<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>k-academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href={{ asset('fonts/img/favicon.ico') }} rel="icon">



    <!-- Libraries Stylesheet -->
    <link href={{ asset('fonts/lib/animate/animate.min.css') }} rel="stylesheet">
    <link href={{ asset('fonts/lib/owlcarousel/assets/owl.carousel.min.css') }} rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href= {{asset('fonts/css/bootstrap.min.css')}} rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href={{ asset('fonts/css/style.css') }} rel="stylesheet">
</head>

<body>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href={{url('/')}} class="navbar-brand d-flex align-items-center px-4 px-lg-5"><img src={{ asset('fonts/img/logo.png') }}>
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>k-acdemy</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                <a href={{url('/')}} class="nav-item nav-link active" >Home</a>
                <a href={{url('about')}} class="nav-item nav-link">About</a>
                <a href={{url('courses')}} class="nav-item nav-link">Courses</a>
                <a href={{('contact')}}  class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-3 d-none d-lg-block">sing in<i class="fa fa-arrow-right ms-3"></i></a>
            <a href="" class="btn btn-primary py-4 px-lg-3 d-none d-lg-block">sing up<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
