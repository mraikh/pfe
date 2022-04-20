<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href=" {{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">

                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="col-12"><h3><label for="yourName" class="form-label">Your Name</label></h3>

                      <input type="text" name="name" class="form-control" id="name" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="col-12">
                        <x-label for="role" :value="__('Role')" />
                         <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="role" id="role" required :value="old('role')">
                        <option value="1">Formateur</option>
                        <option value="2">Apprenant</option>
                      </select>
                </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="Password" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                      <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password_confirmation" name="password_confirmation" class="form-control" id="password_confirmation" required>
                      <div class="invalid-feedback">'Confirm Password</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>

                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div> </div>
          </div>
        </div>

      </section>

    </div>
  </main>


  <script src="{{asset('assets/js/main.js')}} "></script>

</body>
</html>
