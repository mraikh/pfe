@extends('layout')
@section('content')
<!-- Header Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
            <h1 class="mb-5">Contact For Any Query</h1>
            <div>@if (Session::has('message_sent'))
                <div class="alter alter-success">
    {{Session::get('message_sent')}}
                </div>

                @endif</div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex align-items-center mb-3">

                    <div class="ms-3">
                        <h5 class="text-primary">Office</h5>
                        <p class="mb-0">Nr 1565 Hay Salam,Agadir,Morocco</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">

                    <div class="ms-3">
                        <h5 class="text-primary">Mobile</h5>
                        <p class="mb-0">+212 6</p>
                        <p class="mb-0">+212 61911-1789</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <h5 class="text-primary">Email</h5>
                        <p class="mb-0">NouhailaMraikh@gmail.com</p>
                        <p class="mb-0">nidkouchiyassine@gmail.com</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-10 wow fadeInUp" data-wow-delay="0.5s">
                <form action={{route('send')}}  method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"name="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control"name="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"name="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here"name="message" style="height: 150px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->






</body>
</html>

@endsection
