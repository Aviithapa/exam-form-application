
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
                                    <form action="{{ route('student.personalInformation') }}" method="POST">
                                        @csrf

                                        <div class="row"> 
                                            <div class="card-header  mb-3">
                                                 <h4 class="header-title"> Personal Information</h4>
                                            </div>

                                             <div class="row" style="display: flex; justify-content:space-between;">
                                              <div class="col-lg-6">
                                              </div>
                                            <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Profile Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getTranscriptImage():imageNotFound())}}" height="150" width="150"
                                                                         id="profile_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="profile_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="profile_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="profile_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="profile_image" name="profile_image"
                                                                       onclick="anyFileUploader('profile')" >
                                                                <input type="hidden" id="profile_path" name="profile" class="form-control"
                                                                       value="{{isset($data)?$data->transcript_image:''}}"/>
                                                                 @if($errors->first('profile'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('profile') }}
                                                                  </div>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                          
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">पूरा नाम थार</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="पूरा नाम थार" name="full_name_nepali"  required value="{{ old('full_name_nepali') }}">
                                                    @if($errors->first('full_name_nepali'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('full_name_nepali') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Full Name English </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Full name" name="full_name_english" required value="{{ old('full_name_english') }}">
                                                    @if($errors->first('full_name_english') )
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('full_name_english') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Date of Birth (YYYY-MM-DD B.S) </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_nepali" required value="{{ old('dob_nepali') }}">
                                                    @if($errors->first('dob_nepali'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('dob_nepali') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Date of Birth (YYYY-MM-DD A.D) </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_english" required value="{{ old('dob_english') }}">
                                                    @if($errors->first('dob_english'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('dob_english') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Citizenship Number </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="citizenship_number" required value="{{ old('citizenship_number') }}">
                                                    @if($errors->first('citizenship_number'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('citizenship_number') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Issued District </label>
                                                    <input type="text" class="form-control" id="validationCustom01"  name="issued_district" required value="{{ old('issued_district') }}">
                                                    @if($errors->first('issued_district'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('issued_district') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Contact Number</label>
                                                    <input type="text" class="form-control" id="validationCustom01"  name="contact_number" required value="{{ old('contact_number') }}">
                                                    @if($errors->first('contact_number'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('contact_number') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Mobile Number</label>
                                                    <input type="text" class="form-control" id="validationCustom01"  name="phone_number" required value="{{ old('phone_number') }}">
                                                   @if( $errors->first('phone_number'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('phone_number') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Email</label>
                                                    <input type="text" class="form-control" id="validationCustom01"  name="email" required value="{{ old('email') }}">
                                                     @if( $errors->first('email'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('email') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="card-header mb-3">
                                                 <h4 class="header-title"> स्थायी ठेगाना / Permanent Address</h4>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">प्रदेश / Provision</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Province" name="province_id" required value="{{ old('province_id') }}">
                                                    @if($errors->first('province_id'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('province_id') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">जिल्ला / District </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="District" name="district_id" required value="{{ old('district_id') }}">
                                                    @if($errors->first('district_id'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('district_id') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                              <div class="col-lg-4 col-md-4 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Municipality/Rural Municipality:</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Select Municipality" name="municipality_id" required value="{{ old('municipality_id') }}">
                                                    @if($errors->first('municipality_id'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('municipality_id') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Ward No. </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Ward No" name="ward_no" required value="{{ old('ward_no') }}">
                                                    @if($errors->first('ward_no'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('ward_no') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-4 col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Tole </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Tole" name="tole"  value="{{ old('tole') }}">
                                                    @if($errors->first('tole'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('tole') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                            
                                                                         
                                        </div>
                                        <div class="row" style="display: flex; justify-content:space-between;">
                                            <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Citizenship Front Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getTranscriptImage():imageNotFound())}}" height="150" width="150"
                                                                         id="citizenship_front_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="citizenship_front_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="citizenship_front_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="citizenship_front_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="citizenship_front_image" name="citizenship_front_image"
                                                                       onclick="anyFileUploader('citizenship_front')">
                                                                <input type="hidden" id="citizenship_front_path" name="citizenship_front" class="form-control"
                                                                       value="{{isset($data)?$data->transcript_image:''}}"/>
                                                                 @if($errors->first('citizenship_front'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('citizenship_front') }}
                                                                  </div>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Citizenship Back Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getTranscriptImage():imageNotFound())}}" height="150" width="150"
                                                                         id="citizenship_back_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="citizenship_back_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="citizenship_back_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="citizenship_back_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="citizenship_back_image" name="citizenship_back_image"
                                                                       onclick="anyFileUploader('citizenship_back')">
                                                                <input type="hidden" id="citizenship_back_path" name="citizenship_back" class="form-control"
                                                                       value="{{isset($data)?$data->transcript_image:''}}"/>
                                                                 @if($errors->first('citizenship_back'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('citizenship_back') }}
                                                                  </div>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-lg-3">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Signature Photo *</label><br>
                                                                @if(isset($data))
                                                                    <img src="{{url(isset($data)?$data->getTranscriptImage():imageNotFound())}}" height="150" width="150"
                                                                         id="signature_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="signature_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="signature_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="signature_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="signature_image" name="signature_image"
                                                                       onclick="anyFileUploader('signature')">
                                                                <input type="hidden" id="signature_path" name="signature" class="form-control"
                                                                       value="{{isset($data)?$data->transcript_image:''}}"/>
                                                                 @if($errors->first('signature'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('signature') }}
                                                                  </div>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                        <button class="btn btn-primary mt-3" type="submit">Next</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    

@endsection
@push('scripts')
@include('parties.common.file-upload')
@endpush