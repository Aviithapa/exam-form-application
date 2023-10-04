@extends('auth.app')

@section('content')
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            
                            <div class="col-lg-12">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-3">
                                        {{-- <a href="index.html" class="logo-light">
                                            <img src="assets/images/logo.png" alt="logo" height="22">
                                        </a> --}}
                                        <a href="index.html" class="logo-dark">
                                            <img src="{{ asset('images/logo.jpeg') }}" alt="dark logo" height="60">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Reset Password</h4>
                                        <p class="text-muted mb-3">Enter your email get the otp.
                                        </p>

                                        <!-- form -->
                                        <form action="{{ url('/forgot-password') }}" method="POST">
                                             @csrf
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Enter your email address</label>
                                                <input class="form-control" type="email" id="emailaddress" required=""
                                                    placeholder="Enter your email" value="{{ old('email') }}" name="email">
                                            </div>

                                            @if($errors->any())
                                     
                                             <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                   {{ $errors->first('email') }}
                                             </div>
                                             @endif
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"> <span class="fw-bold">Reset Email</span> </button>
                                            </div>

                                          
                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection