@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nepal Bar Council</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Exam</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                     
                        <div class="row">
    
                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('dashboard.exam.create') }}" class="btn btn-primary" style="color: white;">Create New Exam</a>
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
                                                            <th>Assign</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($exams as $exam)
                                                        <tr>
                                                            <td>{{ $exam->id }}</td>
                                                            <td>{{ $exam->name }}</td>
                                                            <td>{{ $exam->form_open_date }}</td>
                                                            <td>{{ $exam->form_deu_date }}</td>
                                                            <td>{{ $exam->form_double_dustur_date }}</td>
                                                            <td><span class="badge bg-info-subtle text-info">{{ $exam->status }}</span></td>
                                                            <td>Techzaa Studio</td>
                                                            <td><a href="{{ route('dashboard.exam.edit', ['id' => $exam->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a></td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>

@endsection