@extends('admin.layout.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">


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
                                         Municipality</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('municipalities.update', ["municipality" => $model->id]) }}">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('municipalities.store') }}">
                                        @endif
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Municipality Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="name"  required value="{{ isset($model) ? $model->name :old('name') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('name') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            
                                           
                
                                           <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">जिल्ला / District </label>
                                                      <select class="form-control select2" name="district_id" data-toggle="select2">
                                                        <option value="{{ isset($model) ? $model->district_id : old('district_id') }}" selected>{{ isset($model) ? $model->district->name : "Please Select" }}</option>
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
  <script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>
  <script> 
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endpush