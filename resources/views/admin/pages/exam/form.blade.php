@extends('admin.layout.app')

@section('content')



                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">
                                        @if(isset($model))
                                        Edit
                                        @else
                                        Create 
                                        @endif
                                         Exam Form</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('dashboard.exam.update', ["id" => $model->id]) }}">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('dashboard.exam.store') }}">
                                        @endif
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Exam Name</label>
                                                    <input type="text" class="form-control" placeholder="Exam Name" name="name"  required value={{ isset($model) ? $model->name :old('name') }}>
                                                      @if($errors->any())
                                                         {{ $errors->first('name') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Form Open Date </label>
                                                    <input type="date" class="form-control" id="validationCustom01" placeholder="Form Open Date" name="form_open_date"  required value={{ isset($model) ? $model->form_open_date : old('form_open_date') }}>
                                                     @if($errors->any())
                                                         {{ $errors->first('form_open_date') }}
                                                      @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Form Double Dustur Date </label>
                                                    <input type="date" class="form-control" id="validationCustom01" placeholder="Form Double Dustur Date" name="form_double_dustur_date" value={{ isset($model) ? $model->form_double_dustur_date : old('form_double_dustur_date') }} required>
                                                     @if($errors->any())
                                                         {{ $errors->first('form_double_dustur_date') }}
                                                      @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Form Deu Date </label>
                                                    <input type="date" class="form-control" id="validationCustom01" placeholder="Form Deu Date" name="form_deu_date" required value={{ isset($model) ? $model->form_deu_date : old('form_deu_date') }}>
                                                     @if($errors->any())
                                                         {{ $errors->first('form_deu_date') }}
                                                      @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Status</label>
                                                        <select class="form-select mb-3" name="status">
                                                            <option value="{{ isset($model) ? $model->status : old('status') }}">{{ isset($model) ? $model->status : old('status') }}</option>
                                                            <option value="Open">Active</option>
                                                            <option value="Closed">In-Active</option>
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('status') }}
                                                      @endif
                                                </div>
                                            </div> 
                                          <div class="col-lg-6 col-md-6 col-sm-12"> 
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Publish Admit Card</label>
                                                <select class="form-select mb-3" name="published">
                                                    <option value="{{ isset($model) ? $model->published : old('published') }}">
                                                        {{ isset($model) ? $model->published : old('published') }}
                                                    </option>
                                                    <option value="1">Publish</option>
                                                    <option value="0">Not Published</option>
                                                </select>
                                                @if($errors->any())
                                                    {{ $errors->first('published') }} <!-- Corrected the name attribute here -->
                                                @endif
                                            </div>
                                        </div>
                                           <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Signature Image *</label><br>
                                                            
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
                                                                       value="{{isset($model)?$model->signature:''}}"/>
                                                                 @if($errors->first('signature'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('signature') }}
                                                                  </div>
                                                                 @endif
                                                                   <br/>
                                                                  <span style="color:red">Please upload image files JPEG, PNG, JPG </span>
                                                            </div>
                                                        </div>
                                                    </div>
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

@push('scripts')
@include('parties.common.file-upload')
@endpush