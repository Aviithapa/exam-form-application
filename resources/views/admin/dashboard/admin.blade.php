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
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Total Applicant</h6>
                                        <h2 class="my-2">{{ count($applicant) }}</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">8.21%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Rejected Applicant</h6>
                                        <h2 class="my-2">{{ count($applicant) }}</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            {{-- <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Revenue</h6>
                                        <h2 class="my-2">$9,254.62</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col--> --}}

                            {{-- <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Orders</h6>
                                        <h2 class="my-2">753</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col--> --}}

                            {{-- <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-group-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Users</h6>
                                        <h2 class="my-2">63,154</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">8.21%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col--> --}}
                        </div>

                        
                        

                        <div class="row">
                       

                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <button class="btn btn-primary">Create New Exam</button>
                                            </div>
                                            <h5 class="header-title mb-0">Licence Exam</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Exam Name</th>
                                                            <th>Start Date</th>
                                                            <th>Double Dustur Date</th>
                                                            <th>Due Date</th>
                                                            <th>Status</th>
                                                            <th>Total Applicant</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($exams as $key => $exam)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $exam->name }}</td>
                                                            <td>{{ $exam->form_open_date }}</td>
                                                            <td>{{ $exam->form_deu_date }}</td>
                                                            <td>{{ $exam->form_double_dustur_date }}</td>
                                                            <td><span class="badge bg-info-subtle text-info">{{ $exam->status }}</span></td>
                                                            <td>{{ $exam->applicant()->count() }}</td>
                                                            <td><a href="{{ route('dashboard.exam.edit', ['id' => $exam->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                            <form id="delete-form-{{ $exam->id }}" action="{{ route('dashboard.exam.destroy', ['id' => $exam->id]) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $exam->id }}').submit();">
                                                                <span class="badge bg-danger-subtle text-danger">Delete</span>
                                                            </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
    
                                                    </tbody>
                                                  
                                                </table>
                                                  <a href="{{ route('dashboard.exam.index') }}" class="text-right" style="padding: 10px; float:right;">Show all </a>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->


@endsection