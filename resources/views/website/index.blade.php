
@extends('website.layout.app')

@section('content')

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card card-body">
                                <h4 class="card-title">Start New Registartion</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="{{ url('/form') }}" class="btn btn-primary">Start Registration</a>
                            </div> <!-- end card-->
                        </div> 
                        <div class="col-sm-6">
                            <div class="card card-body">
                                <h4 class="card-title">Review Registration</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="{{ url('/review-registration') }}" class="btn btn-primary">Review Status</a>
                            </div> <!-- end card-->
                        </div> 
                       
                    </div>
                    <!-- end row -->

@endsection