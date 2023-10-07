@extends('admin.layout.app')

@section('content')

<!-- Include select2 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

{{-- <!-- Include select2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}

                 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">दरखास्त फाराम</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                      @if(isset($applicant))
                                             <form method="POST" action="{{ route('student.personalInformation.update', ["id" => $applicant->id]) }}">
                                                 @method('PUT')
                                        @else
                                             <form action="{{ route('student.personalInformation') }}" method="POST">
                                        @endif
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
                                                                    <img src="{{url(isset($data[3]->path)?getImage($data[3]->path):imageNotFound())}}" height="150" width="150"
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
                                                                       onclick="anyFileUploader('profile')">
                                                                <input type="hidden" id="profile_path" name="profile" class="form-control"
                                                                       value="{{isset($data[3]->path)?$data[3]->path:''}}"/>
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
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="पूरा नाम थार" name="full_name_nepali"  required value="{{ isset($applicant) ? $applicant->full_name_nepali : old('full_name_nepali') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Full name" name="full_name_english" required value="{{ isset($applicant) ? $applicant->full_name_english : old('full_name_english') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_nepali" required value="{{ isset($applicant) ? $applicant->dob_nepali :old('dob_nepali') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_english" required value="{{ isset($applicant) ? $applicant->dob_english : old('dob_english') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="citizenship_number" required value="{{ isset($applicant) ? $applicant->citizenship_number : old('citizenship_number') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01"  name="issued_district" required value="{{ isset($applicant) ? $applicant->issued_district : old('issued_district') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01"  name="contact_number" required value="{{ isset($applicant) ? $applicant->contact_number : old('contact_number') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01"  name="phone_number" required value="{{ isset($applicant) ? $applicant->phone_number : old('phone_number') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01"  name="email" required value="{{ isset($applicant) ? $applicant->email :old('email') }}">
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
                                                     <select class="form-control select2" name="province_id" data-toggle="select2">
                                                        <option value="{{ isset($applicant) ? $applicant->province_id : old('province_id') }}" selected>{{ isset($applicant) ? $applicant->province->name : "Please Select" }}</option>
                                                        @foreach($provinces as $province)
                                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                        @endforeach
                                                     </select>
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
                                                      <select class="form-control select2" name="district_id" data-toggle="select2">
                                                        <option value="{{ isset($applicant) ? $applicant->district_id : old('district_id') }}" selected>{{ isset($applicant) ? $applicant->district->name : "Please Select" }}</option>
                                                        @foreach($districts as $district)
                                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                        @endforeach
                                                     </select>
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
                                                     <select class="form-control select2" name="municipality_id" data-toggle="select2">
                                                        <option value="{{ isset($applicant) ? $applicant->municipality_id : old('district_id') }}" selected>{{ isset($applicant) ? $applicant->municipality->name : "Please Select" }}</option>
                                                        @foreach($municipalities as $municipality)
                                                            <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                                                        @endforeach
                                                     </select>
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
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Ward No" name="ward_no" required value="{{ isset($applicant) ? $applicant->ward_no : old('ward_no') }}">
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
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Tole" name="tole"  value="{{ isset($applicant) ? $applicant->tole : old('tole') }}">
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
                                                                    <img src="{{url(isset($data)?getImage($data[0]->path):imageNotFound())}}" height="150" width="150"
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
                                                                       value="{{isset($data)?$data[0]->path:''}}"/>
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
                                                                    <img src="{{url(isset($data)?getImage($data[1]->path):imageNotFound())}}" height="150" width="150"
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
                                                                       value="{{isset($data)?$data[1]->path:''}}"/>
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
                                                                    <img src="{{url(isset($data)?getImage($data[2]->path):imageNotFound())}}" height="150" width="150"
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
                                                                       value="{{isset($data)?$data[2]->path:''}}"/>
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
  <script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>
  <script> 
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endpush