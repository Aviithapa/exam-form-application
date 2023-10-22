@extends('admin.layout.app')

@section('content')

  
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nepal Bar Council</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome to online exam form !</h4>
                                </div>
                            </div>
                        </div>
                       

                      @if(isset($voucherData) && $voucherData->status === 'REJECTED')
                         
                        <div class="col-xl-12 col-sm-12">
                            <div class="card">
                                <div class="card-header bg-danger text-white">
                                    <div class="card-widgets">
                                        <a href="javascript:;" data-bs-toggle="reload"><i
                                                class="ri-refresh-line"></i></a>
                                        <a data-bs-toggle="collapse" href="#card-collapse6" role="button"
                                            aria-expanded="false" aria-controls="card-collapse6"><i
                                                class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <h5 class="card-title mb-0">Alert !! Alert !! Rejected</h5>
                                </div>
                                <div id="card-collapse6" class="collapse show">
                                    <div class="card-body">
                                       Your application has been declined. To access the review logs, kindly click the "Check Logs" button below. Should you need to update any necessary documentation, please make the required changes and proceed by selecting the "Send for Re-review" button to continue your application process.
                                    </div>

                                     <div class="d-flex flex-wrap gap-2" style="padding-bottom: 10px; padding-left: 15px;">
                                            
                                           <button onclick="window.location.href = '{{ route('student.logs') }}'" type="button" class="btn btn-success">Check Logs</button>
                                   
                                            <button onclick="window.location.href = '{{ route('student.re-review') }}'" type="button" class="btn btn-warning">Send for Re-review</button>
                                           
                                        </div>
                                </div>
                                
                            </div>
                            <!-- end card-->
                        </div>
                        
                      @endif
                       
                          <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="timeline timeline-left">
                                            <article class="timeline-item alt">
                                                <div class="text-start">
                                                    <div class="time-show first">
                                                        <a href="#" class="btn btn-primary w-lg">For Applying For Nepal Bar Council Examnation, Please read the below instrution</a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="timeline-item">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box {{ isset($applicant) ? 'text-primary' :'' }} ">
                                                            <span class="arrow"></span>
                                                            <span class="timeline-icon bg-primary"><i class="ri-record-circle-line"></i></span>
                                                            <h4 class="fs-16 fw-semibold ">First Step</h4>
                                                            <p class="timeline-date text-muted"><small></small></p>
                                                            <p>Add your personal details 
                                                                 @if(!isset($applicant))
                                                                    <a href="{{ route('student.personalForm') }}">Click Here to Add Personal Information</a>
                                                             @endif 
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                             <article class="timeline-item">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box {{ isset($applicant->familyInformation) ? 'text-primary' :'' }}">
                                                            <span class="arrow"></span>
                                                            <span class="timeline-icon"><i class="ri-record-circle-line"></i></span>
                                                            <h4 class="fs-16 fw-semibold ">Second Step</h4>
                                                            <p class="timeline-date text-muted"><small></small></p>
                                                            <p>Add your family details 
                                                             @if(isset($applicant) && !isset($applicant->familyInformation))
                                                                    <a href="#">Click Here to Add Family Information</a>
                                                             @endif    
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                             <article class="timeline-item">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box  {{ isset($applicant->qualification) ? 'text-primary' :'' }}">
                                                            <span class="arrow"></span>
                                                            <span class="timeline-icon"><i class="ri-record-circle-line"></i></span>
                                                            <h4 class="fs-16 fw-semibold ">Third Step</h4>
                                                            <p class="timeline-date text-muted"><small></small></p>
                                                            <p>Add your qualification 
                                                               @if(isset($applicant) && isset($applicant->familyInformation))
                                                                    <a href="#">Click Here to Add Qualification Information</a>
                                                               @endif 

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                             <article class="timeline-item">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box">
                                                            <span class="arrow"></span>
                                                            <span class="timeline-icon"><i class="ri-record-circle-line"></i></span>
                                                            <h4 class="fs-16 fw-semibold ">Fourth Step</h4>
                                                            <p class="timeline-date text-muted"><small></small></p>
                                                            <p>Upload your payment voucher
                                                            </p>
                                                            @if(isset($applicant) && isset($applicant->familyInformation))
                                                             <form action="{{ route('applyExam') }}" method="POST">
                                                                   @csrf
                                                                  <div class="row" style="display: flex; justify-content:space-between;">
                                                                    {{-- $table->string('name')->nullable();
                                                                    $table->string('voucher_number')->nullable();
                                                                    $table->string('contact_number')->nullable(); --}}
                                                            
                                                              <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                                 <div class="col-lg-3 col-md-3 col-sm-12"> 
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom01">Name</label>
                                                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" name="name"  required value="{{ isset($voucherData) ? $voucherData->name : old('name') }}">
                                                                        @if($errors->first('name'))
                                                                                <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                                    {{ $errors->first('name') }}
                                                                                </div>
                                                                        @endif
                                                                    </div>
                                                                </div> 
                                                                <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                                    <div class="col-lg-3 col-md-3 col-sm-12"> 
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">Voucher Number</label>
                                                                            <input type="text" class="form-control" id="validationCustom01" placeholder="" name="voucher_number"  required value="{{ isset($voucherData) ?  $voucherData->voucher_number : old('voucher_number') }}">
                                                                            @if($errors->first('voucher_number'))
                                                                                    <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                                        {{ $errors->first('voucher_number') }}
                                                                                    </div>
                                                                            @endif
                                                                        </div>
                                                                    </div> 
                                                                 </div>  
                                                                 <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                                    <div class="col-lg-3 col-md-3 col-sm-12"> 
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">Phone Number</label>
                                                                            <input type="text" class="form-control" id="validationCustom01" placeholder="" name="contact_number"  required value="{{ isset($voucherData) ? $voucherData->contact_number : old('contact_number') }}">
                                                                            @if($errors->first('contact_number'))
                                                                                    <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                                        {{ $errors->first('contact_number') }}
                                                                                    </div>
                                                                            @endif
                                                                        </div>
                                                                    </div> 
                                                                 </div> 
                                                                  <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                                    <div class="col-lg-3 col-md-3 col-sm-12"> 
                                                                         <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">Exam Center</label>
                                                                            <select class="form-control select2" name="province_id" data-toggle="select2" disabled={{ editStatus($applicant->id) }}>
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
                                                                 </div>   
                                                                     <div class="col-lg-3">
                                                                            <div class="grid-body">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="col-md-12 col-lg-12">
                                                                                            <label>Upload Voucher Image *</label><br>
                                                                                            @if(isset($voucher))
                                                                                                <img src="{{url(isset($voucher)?getImage($voucher->path):imageNotFound())}}" height="150" width="150"
                                                                                                    id="voucher_img">
                                                        
                                                                                            @else
                                                                                                <img src="{{isset($voucher)?$voucher->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                                                    id="voucher_img">
                                                                                            @endif
                                                                                        </div>
                                                        
                                                                                        <div class="form-group col-md-12 col-lg-12">
                                                                                            <small>Below 1 mb</small><br>
                                                                                            <small id="voucher_help_text" class="help-block"></small>
                                                                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                                                aria-valuemax="100"
                                                                                                aria-valuenow="0">
                                                                                                <div id="voucher_progress" class="progress-bar progress-bar-success"
                                                                                                    style="width: 0%">
                                                                                                </div>
                                                                                            </div><br>
                                                                                            <input type="file" id="voucher_image" name="voucher_image"
                                                                                                onclick="anyFileUploader('voucher')" >
                                                                                            <input type="hidden" id="voucher_path" name="voucher" class="form-control"
                                                                                                value="{{isset($voucher)?$voucher->path:''}}"/>
                                                                                            @if($errors->first('voucher'))
                                                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                                                        {{ $errors->first('voucher') }}
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                  </div>
                                                                @if(isset($applicant) && editStatus($applicant->id))
                                                                    <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                                                                        You have successfully applied for the exam 
                                                                    </div>
                                                                @else
                                                                <button class="btn btn-primary mt-3" type="submit">Apply Exam</button>
                                                                @endif
                                                             </form>
                                                             
                                                                   @endif     
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            {{-- <article class="timeline-item ">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box">
                                                            <span class="arrow"></span>
                                                            <span class="timeline-icon bg-success"><i class="ri-record-circle-line"></i></span>
                                                            <h4 class="fs-16 fw-semibold text-success">2 hours ago</h4>
                                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                            <p>consectetur adipisicing elit. Iusto, optio, dolorum <a href="#">John deon</a> provident rerum aut hic quasi placeat iure tempora laudantium </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="timeline-item">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box">
                                                            <span class="arrow"></span>
                                                            <span class="timeline-icon bg-primary"><i class="ri-record-circle-line"></i></span>
                                                            <h4 class="fs-16 fw-semibold text-primary">10 hours ago</h4>
                                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                            <p>3 new photo Uploaded on facebook fan page</p>
                                                            <div class="album">
                                                                <a href="#">
                                                                    <img alt="" src="assets/images/small/small-4.jpg">
                                                                </a>
                                                                <a href="#">
                                                                    <img alt="" src="assets/images/small/small-5.jpg">
                                                                </a>
                                                                <a href="#">
                                                                    <img alt="" src="assets/images/small/small-6.jpg">
                                                                </a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="timeline-item">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box">
                                                            <span class="arrow"></span>
                                                            <span class="timeline-icon bg-purple"><i class="ri-record-circle-line"></i></span>
                                                            <h4 class="fs-16 fw-semibold text-purple">14 hours ago</h4>
                                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                            <p>Outdoor visit at California State Route 85 with John Boltana & Harry Piterson regarding to setup a new show room.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="timeline-item">
                                                <div class="timeline-desk">
                                                    <div class="panel">
                                                        <div class="timeline-box">
                                                            <span class="arrow"></span>
                                                            <span class="timeline-icon"><i class="ri-record-circle-line"></i></span>
                                                            <h4 class="fs-16 fw-semibold text-muted">19 hours ago</h4>
                                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                            <p>Jonatha Smith added new milestone <span><a href="#">Pathek</a></span> Lorem ipsum dolor sit amet consiquest dio</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article> --}}

                                        </div>
                                        <!-- end timeline -->
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>


@endsection

@push('scripts')
@include('parties.common.file-upload')
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <script>
    $(document).ready(function() {
        @if(isset($voucherData) && $voucherData->status === 'REJECTED')
            $('#danger-alert-modal').addClass('modal');
        @endif
    });
</script>
@endpush