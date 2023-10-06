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
                                        <h4 class="fs-20">Sign Up</h4>
                                        <p class="text-muted mb-3">Create your account to apply for council registration exam
                                        </p>

                                        <!-- form -->
                                        <form action="{{ url('/create-account') }}" method="POST">
                                             @csrf
                                              <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Name</label>
                                                <input class="form-control" type="text" id="emailaddress" required=""
                                                    placeholder="Enter your name" value="{{ old('name') }}" name="name">
                                                     @if($errors->first('name'))
                                             <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                   {{ $errors->first('name') }}
                                             </div>
                                             @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" type="email" id="emailaddress" required=""
                                                    placeholder="Enter your email" value="{{ old('email') }}" name="email">
                                            </div>
                                             @if($errors->first('email'))
                                             <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                   {{ $errors->first('email') }}
                                             </div>
                                             @endif
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" required="" id="password"
                                                    placeholder="Enter your password" name="password" value="{{ old('password') }}">
                                            </div>
                                             @if($errors->first('password'))
                                             <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                   {{ $errors->first('password') }}
                                             </div>
                                             @endif
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"> <span class="fw-bold">Sing Up
                                                        </span> </button>
                                            </div>

                                          
                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                 <div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">Already have an account? <a href="{{ url('/login') }}"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Sign In</b></a>
                    </p>
                </div> <!-- end col -->
              </div>
                <!-- end row -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection