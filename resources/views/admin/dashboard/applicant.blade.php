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
                                                                                                onclick="anyFileUploader('voucher')">
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
                                                               
                                                                       <button class="btn btn-primary mt-3" type="submit">Apply Exam</button>
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
  
@endpush