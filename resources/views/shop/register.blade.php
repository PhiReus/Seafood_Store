
<section class="vh-100 gradient-custom">
@include('sweetalert::alert')

    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <form method="POST" action="{{ route('shop.checkregister') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="name" id="name" class="form-control form-control-lg" />
                                        <label class="form-label" for="firstName">Name</label>
                                        @error('name')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <input type="text" name="address" class="form-control form-control-lg" id="address" />
                                        <label for="address" class="form-label">Address</label>
                                        @error('address')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" name="email" id="emailAddress" class="form-control form-control-lg" />
                                        <label class="form-label" for="emailAddress">Email</label>
                                        @error('email')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="phone" id="phoneNumber" class="form-control form-control-lg" />
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        @error('phone')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="password" name="password" id="emailAddress"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="emailAddress">Password</label>
                                        @error('password')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="password" name="confirmpassword" id="emailAddress"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="emailAddress">Confirm Password</label>
                                        @error('confirmpassword')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="file" name="image" id="image"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="image">Password</label>
                                        @error('image')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary" type="submit" value="Submit" />
                                <a class="btn btn-info" href="{{ route('shop.login') }}">Already have an account
                                    ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
