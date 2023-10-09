
@extends('admin.layout.app')

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
                                     @if(isset($data))
                                             <form method="POST" action="{{ route('student.guardian.update', ["id" => $data->id]) }}">
                                                 @method('PUT')
                                        @else
                                               <form action="{{ route('student.guardian.store') }}" method="POST">
                                        @endif
                                        @csrf
                                 
                                    

                                        <div class="row"> 
                                           
                                                <div class="card-header mb-3">
                                                 <h4 class="header-title"> Guardian Information</h4>
                                            </div>
                                              <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">हजुरबुवाको नाम नेपाली</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="grandfather_name_nepali" required value="{{ isset($data) ? $data->grandfather_name_nepali : old('grandfather_name_nepali') }}">
                                                    @if($errors->first('full_name_nepali'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('full_name_nepali') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Grandfather Name English</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="grandfather_name_english" required value="{{  isset($data) ? $data->grandfather_name_english : old('grandfather_name_english') }}">
                                                    @if($errors->first('grandfather_name_english'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('grandfather_name_english') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">बुवाको नाम नेपाली</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="father_name_nepali" required value="{{  isset($data) ? $data->father_name_nepali : old('father_name_nepali') }}">
                                                     @if($errors->first('father_name_nepali'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('father_name_nepali') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Father Name English</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="father_name_english" required value="{{  isset($data) ? $data->father_name_english : old('father_name_english') }}">
                                                    @if($errors->first('full_name_english'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('father_name_english') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>  
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">आमाको नाम नेपाली</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mother_name_nepali" required value="{{  isset($data) ? $data->mother_name_nepali : old('mother_name_nepali') }}">
                                                     @if($errors->first('mother_name_nepali'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('mother_name_nepali') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Mother Name English</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="mother_name_english" required value="{{  isset($data) ? $data->mother_name_english : old('mother_name_english') }}">
                                                     @if($errors->first('mother_name_english'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('mother_name_english') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 

                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">यदि विवाहित पति/पत्नीको नाम</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="spouse" value="{{ isset($data) ? $data->spouse :   old('spouse') }}">
                                                     @if($errors->first('spouse'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('spouse') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Citizenship</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="citizenship_number" value="{{ isset($data) ? $data->citizenship_number :  old('citizenship_number') }}">
                                                      @if($errors->first('citizenship_number'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('citizenship_number') }}
                                                            </div>
                                                     @endif
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