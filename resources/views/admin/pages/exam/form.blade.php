@extends('admin.layout.app')

@section('content')



@extends('website.layout.app')

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
                                             
                                            
                                             
                                        </div>
                                            
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

@endsection

@endsection