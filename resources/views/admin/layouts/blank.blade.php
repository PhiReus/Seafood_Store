<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        @yield('content')
                        <section class="vh-100">
                            <div class="container py-5 h-100">
                                <div class="row d-flex align-items-center justify-content-center h-100">
                                    <div class="col-md-8 col-lg-7 col-xl-6">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                                            class="img-fluid" alt="Phone image">
                                    </div>
                                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                                        <form method="post" action="{{ route('checkLogin') }}">
                                            @method('POST')
                                            @csrf
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" id="form1Example13"
                                                    class="form-control form-control-lg" name="email"
                                                    value="{{ old('email') }}" />
                                                <label class="form-label" for="form1Example13">Email address</label>
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <input type="password" id="form1Example23"
                                                    class="form-control form-control-lg" name="password" />
                                                <label class="form-label" for="form1Example23">Password</label>
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="d-flex justify-content-around align-items-center mb-4">
                                                <!-- Checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="form1Example3" checked />
                                                    <label class="form-check-label" for="form1Example3"> Remember me
                                                    </label>
                                                </div>
                                                <a href="{{ route('forgot_password') }}">Forgot password?</a>
                                            </div>

                                            <!-- Submit button -->
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign
                                                in</button>
                                            {{-- <a href="{{ route('register') }}"
                                                class="btn btn-primary btn-lg btn-block">Create an Account</a> --}}

                                            <div class="divider d-flex align-items-center my-4">
                                                <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                                            </div>

                                            <a class="btn btn-primary btn-lg btn-block"
                                                style="background-color: #3b5998" href="#!" role="button">
                                                <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                                            </a>
                                            <a class="btn btn-primary btn-lg btn-block"
                                                style="background-color: #55acee" href="#!" role="button">
                                                <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    @yield('scripts')

</body>

</html>
