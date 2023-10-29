


@extends('admin.layout.app')

@section('content')

<div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Voucher Upload</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                                    <form action="{{ route('applyExam') }}" method="POST">
                                                                   @csrf
                                                                  <div class="row" style="display: flex; justify-content:space-between;">
                                                                  
                                                            
                                                 
                                                                 <div class="col-lg-6 col-md-6 col-sm-12"> 
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
                                                    
 
                                                                    <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">Bank Name</label>
                                                                            <input type="text" class="form-control" id="validationCustom01" placeholder="" name="bank_name"  required value="{{ isset($voucherData) ?  $voucherData->bank_name : old('bank_name') }}">
                                                                            @if($errors->first('bank_name'))
                                                                                    <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                                        {{ $errors->first('bank_name') }}
                                                                                    </div>
                                                                            @endif
                                                                        </div>
                                                                    </div> 
                               
                                                           
                                                                    <div class="col-lg-6 col-md-6 col-sm-12"> 
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
                                                                    <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">Amount</label>
                                                                            <input type="text" class="form-control" id="validationCustom01" placeholder="" name="total_amount"  required value="{{ isset($voucherData) ? $voucherData->total_amount : old('total_amount') }}">
                                                                            @if($errors->first('total_amount'))
                                                                                    <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                                        {{ $errors->first('total_amount') }}
                                                                                    </div>
                                                                            @endif
                                                                        </div>
                                                                    </div> 
                                                  
                                                               
                                                                    <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                                         <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">Exam Center</label>
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
                                </div>
                            </div>
                        </div>
</div>

@endsection

@push('scripts')
@include('parties.common.file-upload')
  
@endpush