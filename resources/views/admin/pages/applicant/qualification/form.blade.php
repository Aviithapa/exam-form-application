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
                                     @if(isset($model))
                                             <form method="POST" action="{{ route('qualification.update', ["id" => $model->id]) }}">
                                                 @method('PUT')
                                        @else
                                           <form action="{{ route('qualification.store') }}" method="POST">
                                        @endif
                                        @csrf
                                    
                                   
                                        <div class="row"> 
                                            <div class="card-header  mb-3">
                                                 <h4 class="header-title"> Qualification Information</h4>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Institute Name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="name"  required value="{{ isset($model) ? $model->name : old('name') }}">
                                                    @if($errors->first('name'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div> 
                                             <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Passed Year</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY" name="passed_year" required value="{{ isset($model) ? $model->passed_year : old('passed_year') }}">
                                                     @if($errors->first('passed_year'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('passed_year') }}
                                                            </div>
                                                     @endif
                                                </div>
                                             </div>
                                             
                                             <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Division / Grade</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First Division | A" name="division" required value="{{ isset($model) ? $model->division : old('division') }}">
                                                     @if($errors->first('division'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('division') }}
                                                            </div>
                                                     @endif
                                                </div>
                                             </div>

                                              <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Percentage / CGPA</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="80% | 3.5" name="percentage" required value="{{ isset($model) ? $model->percentage : old('percentage') }}">
                                                     @if($errors->first('percentage'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('percentage') }}
                                                            </div>
                                                     @endif
                                                </div>
                                             </div>

                                              <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Level</label>
                                                    <select class="form-select mb-3" name="type" ">
                                                            <option value="{{ isset($model) ? $model->type : old('type') }}" selected>{{ isset($model) ? $model->type : "Please Select" }}</option>
                                                            <option value="SLC">SLC</option>
                                                            <option value="HSEB/NEB">HSEB/NEB</option>
                                                            <option value="BACHELOR">BACHELOR</option>
                                                            <option value="LAW-BACHELOR">LAW BACHELOR</option>
                                                            <option value="OTHER">OTHER</option>
                                                        </select>
                                                     @if($errors->first('type'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('type') }}
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
                                                                <label>Transcript / Marksheet Photo *</label><br>
                                                                @if(isset($model))
                                                                    <img src="{{isset($model)?getImage($model->documents[0]->path):imageNotFound()}}" height="150" width="150"
                                                                         id="transcript_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="transcript_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="transcript_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="transcript_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="transcript_image" name="transcript_image"
                                                                       onclick="anyFileUploader('transcript')">
                                                                <input type="hidden" id="transcript_path" name="transcript" class="form-control"
                                                                       value="{{isset($model)?$model->documents[0]->path:''}}"/>
                                                                 @if($errors->first('transcript'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('transcript') }}
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
                                                                <label>Provisional Photo *</label><br>
                                                                @if(isset($model))
                                                                    <img src="{{url(isset($model)?getImage($model->documents[1]->path):imageNotFound())}}" height="150" width="150"
                                                                         id="provisional_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="provisional_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="provisional_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="provisional_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="provisional_image" name="provisional_image"
                                                                       onclick="anyFileUploader('provisional')">
                                                                <input type="hidden" id="provisional_path" name="provisional" class="form-control"
                                                                       value="{{isset($model)?$model->documents[1]->path:''}}"/>
                                                                 @if($errors->first('provisional'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('provisional') }}
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
                                                                <label>Character Photo *</label><br>
                                                                @if(isset($model))
                                                                    <img src="{{url(isset($model)?getImage($model->documents[2]->path):imageNotFound())}}" height="150" width="150"
                                                                         id="character_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="character_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="character_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="character_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="character_image" name="character_image"
                                                                       onclick="anyFileUploader('character')">
                                                                <input type="hidden" id="character_path" name="character" class="form-control"
                                                                       value="{{isset($model)?$model->documents[2]->path:''}}"/>
                                                                 @if($errors->first('character'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('character') }}
                                                                  </div>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                        <button class="btn btn-primary mt-3" type="submit">Save</button>
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