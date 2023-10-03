
@extends('website.layout.app')

@section('content')

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Review your status</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="row"> 
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Date of Birth (YYYY-MM-DD) B.S </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_nep" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                          
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Citizenship Number </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="citizenship_number" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Email</label>
                                                    <input type="text" class="form-control" id="validationCustom01"  name="email" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                        <button class="btn btn-primary" type="submit">Review Status</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

@endsection