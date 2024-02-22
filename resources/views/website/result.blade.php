
@extends('website.layout.app')

@section('content')
 


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-body">
                                <h4 class="card-title text-center">नेपाल कानून व्यवसायी परिषद</h4>
                                <p class="card-text text-center">३१ औं अधिवक्ता परीक्षा</p>
                                        <div class="col-sm-6" style="margin:0px 20%;">
                                               <form action="{{ route('mark-sheet.search') }}" method="POST">
                                        @csrf
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Date of Birth Nepali Format (YYYY-MM-DD)</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="date_of_birth" required value="{{ old('date_of_birth') }}">
                                                    @if($errors->first('date_of_birth'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('date_of_birth') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                             <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Symbol Number </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Symbol Number" name="symbol_number"  value="{{ old('symbol_number') }}">
                                                    @if($errors->first('symbol_number'))
                                                            <div class="alert alert-danger bg-transparent text-danger" role="alert">
                                                                {{ $errors->first('symbol_number') }}
                                                            </div>
                                                     @endif
                                                </div>
                                            </div>
                                            <button class="btn btn-primary mt-3" type="submit">Search Result</button>
                                               </form>
                                        </div>
                                       
                            </div> <!-- end card-->
                        </div> 
                       
                    </div>
                    <!-- end row -->
                      

@endsection