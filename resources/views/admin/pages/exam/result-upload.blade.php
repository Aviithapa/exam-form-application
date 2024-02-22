@extends('admin.layout.app')

@section('content')



                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">
                                        
                                        Result Upload Form</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       
                                            <form method="POST" action="{{ route('importResult.exam') }}" enctype='multipart/form-data'>
                        
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Upload Result</label>
                                                    <input type="file" class="form-control" placeholder="Exam Name" name="file"  required >
                                                      @if($errors->any())
                                                         {{ $errors->first('file') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            

                                            
                                        <button class="btn btn-primary" type="submit">Submit Result</button>
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