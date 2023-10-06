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
                                        <h4 class="fs-20">Verify Otp</h4>
                                        <p class="text-muted mb-3">
                                            Account has been created to activate your account enter the 
                                            opt send to the email.
                                        </p>

                                        <!-- form -->
                                        <form action="{{ url('/verify-register-otp') }}" method="POST">
                                             @csrf
                                            <div class="mb-3">
                                                  <input class="form-control"  id="emailaddress" type="hidden" placeholder="Enter your email" value="{{ isset($email) ? $email : old('email')}}" name="email">
                                                <label for="emailaddress" class="form-label">Enter Otp</label>
                                                <input class="form-control" type="text" id="emailaddress" required=""
                                                    placeholder="Enter your otp" value="{{ old('otp') }}" name="otp">
                                            </div>
                                            @if(session('token'))
                                             <div class="alert alert-info bg-transparent text-info" role="alert">
                                                   {{ session('token') }}
                                             </div>
                                             @endif
                                            @if(session('danger'))
                                     
                                             <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                   {{ session('danger') }}
                                             </div>
                                             @endif
                                                <a href="{{ route('register.resendOtp', ['email' => $email]) }}" class="text-muted float-start mb-2"><small>Resend Otp?</small></a>

                                           
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"> <span class="fw-bold">Activate Account</span> </button>
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