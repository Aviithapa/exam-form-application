@extends('admin.layout.app')

@section('content')


  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nepal Bar Council</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Exam Center wise count data!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                             @foreach($countsByExamCenter as $count)

                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <a href="{{ url('dashboard/admit/'.$count->id) }}" style="color: white !important;">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">{{ $count->name }}</h6>
                                        <h2 class="my-2">{{ $count->exam_center_count }}</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                    </a>
                                </div>
                            </div> <!-- end col-->
                        @endforeach
                        </div>

                        

@endsection