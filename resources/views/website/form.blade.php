
@extends('website.layout.app')

@section('content')

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">दरखास्त फाराम</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="row"> 
                                            <div class="card-header  mb-3">
                                                 <h4 class="header-title"> Personal Information</h4>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">पूरा नाम थार</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="पूरा नाम थार" name="full_name_nepali" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Full Name English </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Full name" name="full_name_english" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Date of Birth (YYYY-MM-DD B.S) </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_nep" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Date of Birth (YYYY-MM-DD A.D) </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_english" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Citizenship Number </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="citizenship_number" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Issued District </label>
                                                    <input type="text" class="form-control" id="validationCustom01"  name="issued_district" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Contact Number</label>
                                                    <input type="text" class="form-control" id="validationCustom01"  name="contact_number" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Mobile Number</label>
                                                    <input type="text" class="form-control" id="validationCustom01"  name="mobile_number" required>
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
                                            
                                           
                                            <div class="card-header mb-3">
                                                 <h4 class="header-title"> स्थायी ठेगाना / Permanent Address</h4>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">प्रदेश / Provision</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="पूरा नाम थार" name="province" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">जिल्ला / District </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Full name" name="district" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-lg-4 col-md-4 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Municipality/Rural Municipality:</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="पूरा नाम थार" name="municipality" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Ward No. </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Full name" name="ward_no" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Tole </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Full name" name="tole" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-header mb-3">
                                                 <h4 class="header-title"> Guardian Information</h4>
                                            </div>
                                              <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Grandfather Name Nepali</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="grandfather_name_nep" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Grandfather Name English</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="grandfather_name_english" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Father Name Nepali</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="father_name_nep" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Father Name English</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="father_name_english" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>  
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Mother Name Nepali</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mother_name_nep" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Mother Name English</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mother_name_english" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">यदि विवाहित पति/पत्नीको नाम</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="spoush_name">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Citizenship Number</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="spoush_citizenship_number">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="card-header mb-3">
                                                 <h4 class="header-title"> Education Information</h4>
                                            </div>
                                            <div class="header mb-3">
                                                 <h4 class="header-title">SLC Information</h4>
                                            </div>
                                              <div class="col-lg-3 col-md-3 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">School Name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="slc_school_name" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Passed Year</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="slc_passed_year">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="col-3"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Division / Grade</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="slc_division">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-3"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Percentage / Grade</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="slc_percentage">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                               
                                            <div class="header mb-3">
                                                 <h4 class="header-title">Intermediate Information</h4>
                                            </div>
                                              <div class="col-lg-3 col-md-3 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">School Name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="intermediate_school_name" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Passed Year</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="intermediate_passed_year">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="col-3"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Division / Grade</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="intermediate_division">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-3"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Percentage / Grade</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="intermediate_percentage">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="header mb-3">
                                                 <h4 class="header-title">Bachelor Information</h4>
                                            </div>
                                              <div class="col-lg-3 col-md-3 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Collage Name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="bachelor_school_name" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Passed Year</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="bachelor_passed_year">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                             <div class="col-3"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Division / Grade</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="bachelor_division">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-3"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Percentage / Grade</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="bachelor_percentage">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div> 

                                            
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="invalidCheck"
                                                    required>
                                                <label class="form-check-label form-label" for="invalidCheck">Agree to
                                                    terms
                                                    and conditions</label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

@endsection