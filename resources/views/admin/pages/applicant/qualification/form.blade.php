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
                                                    <label class="form-label" for="validationCustom01">University Name</label>
                                                    @if(isset($model))
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="university_name" value="{{ isset($model) ? $model->university_name : old('university_name') }}">
                                                    @else
                                                      <select class="form-select mb-3" id="selectUniValue" name="university_name" onchange="chnagePclType()">
                                                           @foreach($university as $uni)
                                                            <option value="{{ $uni->name }}">{{ $uni->name }}</option>
                                                            @endforeach
                                                            <option value="other">Other</option>   
                                                        </select>
                                                    @endif
                                                    <input type="text" class="form-control" id="uniValue" placeholder="Write University Name" name="nothing" value="{{  old('university_name') }}" style="display: none;">

                                                    @if($errors->first('university_name'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('university_name') }}
                                                            </div>
                                                     @endif
                                                </div>
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
                                                    <select class="form-select mb-3" name="type" id="type-select" onchange="level()">
                                                            <option value="{{ isset($model) ? $model->type : old('type') }}" selected>{{ isset($model) ? $model->type : "Please Select" }}</option>
                                                            <option value="LAW-BACHELOR">LAW BACHELOR</option>
                                                            <option value="7-YEAR-PLEADER">7 Year Pleader</option> 
                                                            <option value="PRIVATE">PRIVATE</option>   
                                                            <option value="OTHER">OTHER</option>   

                                                        </select>
                                                     @if($errors->first('type'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('type') }}
                                                            </div>
                                                     @endif
                                                </div>
                                             </div>      
                                               
                                               <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Law Type</label>
                                                    <select class="form-select mb-3" id="lawType" name="law_type" onchange="LawType()" required>
                                                            <option value="{{ isset($model) ? $model->law_type : old('law_type') }}" selected>{{ isset($model) ? $model->law_type : "Please Select Law Type" }}</option>
                                                            <option value="BALLB">BALLB</option>
                                                            <option value="LLB">LLB</option> 
                                                            <option value="OTHER">OTHER</option>   

                                                        </select>
                                                        <input type="text" class="form-control" id="lawValue" placeholder="Write Law Type" name="nothing" value="{{  old('law_type') }}" style="display: none;">
                                                     @if($errors->first('law_type'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('law_type') }}
                                                            </div>
                                                     @endif
                                                </div>
                                             </div>                       
                                        </div>
                                        
                                        <div class="row" style="" id="BACHELOR">
                                            <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Transcript *</label><br>
                                                                @if(isset($model))
                                                                    <img src="{{isset($model->documents)?getImage($model->documents[0]->path):imageNotFound()}}" height="150" width="150"
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
                                              <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Character Photo *</label><br>
                                                            
                                                                @if(isset($model))
                                                                   @php
                                                                    $characterDocument = $model->documents()->where('document_name', 'character')->first();
                                                                    $imagePath = $characterDocument ? getImage($characterDocument->path) : imageNotFound();
                                                                    @endphp

                                                                    <img src="{{ url($imagePath) }}" height="150" width="150" id="character_img">

                            
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
                                                                       value="{{isset($characterDocument)?$characterDocument->path:''}}"/>
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
                                             <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Provisional Photo *</label><br>
                                                                @if(isset($model))
                                                                    @php
                                                                    $provisionalDocument = $model->documents()->where('document_name', 'provisional')->first();
                                                                    $provisionalPath = $provisionalDocument ? getImage($provisionalDocument->path) : imageNotFound();
                                                                    @endphp

                                                                    <img src="{{ url($provisionalPath) }}" height="150" width="150" id="character_img">

                            
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
                                                                       value="{{isset($provisionalDocument->path)?$provisionalDocument->path:''}}"/>
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
                                             <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Equivalence *</label><br>
                                                                @if(isset($model))
                                                                    <img src="{{isset($model->documents)?getImage($model->documents[0]->path):imageNotFound()}}" height="150" width="150"
                                                                         id="equivalence_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="equivalence_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="equivalence_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="equivalence_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="equivalence_image" name="equivalence_image" 
                                                                       onclick="anyFileUploader('equivalence')">
                                                                <input type="hidden" id="equivalence_path" name="equivalence" class="form-control"
                                                                       value="{{isset($model)?$model->documents[0]->path:''}}"/>
                                                                 @if($errors->first('equivalence'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('equivalence') }}
                                                                  </div>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Transcript Additional *</label><br>
                                                                @if(isset($model))
                                                                    <img src="{{isset($model->documents)?getImage($model->documents[0]->path):imageNotFound()}}" height="150" width="150"
                                                                         id="transcript_add_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="transcript_add_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="transcript_add_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="transcript_add_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="transcript_add_image" name="transcript_add_image" 
                                                                       onclick="anyFileUploader('transcript_add')">
                                                                <input type="hidden" id="transcript_add_path" name="transcript_add" class="form-control"
                                                                       value="{{isset($model)?$model->documents[0]->path:''}}"/>
                                                                 @if($errors->first('transcript_add'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('transcript_add') }}
                                                                  </div>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Transcript Additional *</label><br>
                                                                @if(isset($model))
                                                                    <img src="{{isset($model->documents)?getImage($model->documents[0]->path):imageNotFound()}}" height="150" width="150"
                                                                         id="transcript_additional_img">
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="transcript_additional_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="transcript_additional_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="transcript_additional_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="transcript_additional_image" name="transcript_additional_image" 
                                                                       onclick="anyFileUploader('transcript_additional')">
                                                                <input type="hidden" id="transcript_additional_path" name="transcript_additional" class="form-control"
                                                                       value="{{isset($model)?$model->documents[0]->path:''}}"/>
                                                                 @if($errors->first('transcript_additional'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('transcript_additional') }}
                                                                  </div>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                        
                                         </div>
                                        <div class="row" style="display: flex; justify-content:space-between;" id="7-YEAR-PLEADER">
                                            <div class="col-lg-4">
                                                <div class="grid-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-12 col-lg-12">
                                                                <label>Licence *</label><br>
                                                                @if(isset($model))
                                                                 @php
                                                                    $licenceDocument = $model->documents()->where('document_name', 'licence')->first();
                                                                    $licencePath = $licenceDocument ? getImage($licenceDocument->path) : imageNotFound();
                                                                    @endphp

                                                                     <img src="{{ url($licencePath) }}" height="150" width="150"   id="licence_img">
                                                               
                            
                                                                @else
                                                                    <img src="{{isset($data)?$data->getTranscriptImage():imageNotFound('user')}}" height="150" width="150"
                                                                         id="licence_img">
                                                                @endif
                                                            </div>
                            
                                                            <div class="form-group col-md-12 col-lg-12">
                                                                <small>Below 1 mb</small><br>
                                                                <small id="licence_help_text" class="help-block"></small>
                                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100"
                                                                     aria-valuenow="0">
                                                                    <div id="licence_progress" class="progress-bar progress-bar-success"
                                                                         style="width: 0%">
                                                                    </div>
                                                                </div><br>
                                                                <input type="file" id="licence_image" name="licence_image"
                                                                       onclick="anyFileUploader('licence')">
                                                                <input type="hidden" id="licence_path" name="licence" class="form-control"
                                                                       value="{{isset($licenceDocument)?$licenceDocument->path:''}}"/>
                                                                 @if($errors->first('licence'))
                                                                  <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                             {{ $errors->first('licence') }}
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
<script> 
    // Function to show LAW BACHELOR div by default on document ready
      function level(){
         const sb = document.querySelector('#type-select');
         console.log(sb.value);
             switch (sb.value) {
                case 'LAW-BACHELOR' : 
                    $("#BACHELOR").show();
                break;
                case '7-YEAR-PLEADER' :
                    $("#BACHELOR").hide();
                    $("#7-YEAR-PLEADER").show();
                break;
             }
      }

      function chnagePclType(){
        const sb = document.querySelector('#selectUniValue');
         console.log(sb.value);
             switch (sb.value) {
                case 'other' : 
                    $("#uniValue").attr('name', 'university_name');
                    $("#selectUniValue").attr('name', 'nothing');
                    $("#uniValue").show()
                break;
               default :
                    $("#selectUniValue").attr('name', 'university_name');
                    $("#uniValue").attr('name', 'nothing');
                    $("#uniValue").hide()
                break;
             }
      }

       function LawType(){
          const sb = document.querySelector('#lawType');
         console.log(sb.value);
             switch (sb.value) {
                case 'OTHER' : 
                    $("#lawValue").attr('name', 'law_type');
                    $("#lawType").attr('name', 'nothing');
                    $("#lawValue").show()

                break;
               default :
                    $("#lawValue").attr('name', 'nothing');
                    $("#lawType").attr('name', 'law_type');
                    $("#lawValue").hide()
                break;
             }
         
      }
</script>
@endpush

