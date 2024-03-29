<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'K-Academy') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
{{--    <link href={{ asset('fonts/img/favicon.ico') }} rel="icon">--}}

<!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

{{--    <!-- Libraries Stylesheet -->--}}
{{--    <link href={{ asset('fonts/lib/animate/animate.min.css') }} rel="stylesheet">--}}
{{--    <link href={{ asset('fonts/lib/owlcarousel/assets/owl.carousel.min.css') }} rel="stylesheet">--}}

<!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href= {{asset('fonts/css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{ asset('fonts/css/style.css') }} rel="stylesheet">
    <link href={{ asset('fonts/css/app.css') }} rel="stylesheet">
    {{--    <!-- Template Stylesheet -->--}}

{{--        <link href={{ asset('css/app.css') }} rel="stylesheet">--}}
    <link href={{ asset('css/style.css') }} rel="stylesheet">
</head>

<body>
@include('front.layouts.header')
<main>
    @include('front.layouts.messages')
    @yield('content')
</main>
@include('front.layouts.footer')
<!-- JavaScript Libraries -->
<script src={{ asset('fonts/lib/wow/wow.min.js') }}></script>
<script src={{ asset('fonts/lib/easing/easing.min.js') }}></script>
<script src={{ asset('fonts/lib/waypoints/waypoints.min.js') }}></script>
<script src={{ asset('lib/owlcarousel/owl.carousel.min.js') }}></script>

<!-- Template Javascript -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src={{ asset('fonts/js/main.js') }}></script>
</body>

</html>
