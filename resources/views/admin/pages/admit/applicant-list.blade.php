@extends('admin.layout.app')

@section('content')

   

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nepal Bar Council</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Applicant List</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Applicant List</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                    
                           <!-- Todo-->
                             
                        

                        <div class="row">
                       

                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="header-title mb-0">Total Number of Applicant : {{ $applicants->total() }}</h5>
                                            {{-- @if(isset($isAdmit))
                                            <div class="d-flex justify-content-end align-items-center gap-2">
                                                <a href="{{ route('applicant.generateAdmitCard') }}" class="btn btn-soft-info">
                                                    <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                                        Generate Admit Card
                                                </a>
                                            </div>
                                            @endif --}}
                                            <div class="d-flex justify-content-end align-items-center gap-2">
                                                <a href="{{ url('/applicant/generateAdmitCard/' .$id) }}" class="btn btn-soft-info">
                                                    <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                                       Generate Admit Card
                                                </a>
                                            </div>
                                        
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
                                            <div class="table-responsive">
                                                <table  
                                                 id="alternative-page-datatable"
                                                class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Citizenship Number</th>
                                                            <th>Applied Date</th>
                                                            <th>Status</th>
                                                            <th>Symbol Number</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       @foreach($applicants as $key =>  $applicant)
                                                            @php
                                                                $pageRelativeIndex = ($applicants->currentPage() - 1) * $applicants->perPage() + ($key + 1);
                                                              @endphp
                                                            <tr>
                                                            <td>{{ $pageRelativeIndex }}</td>
                                                            <td>{{ $applicant->full_name_english }}</td>
                                                            <td>{{ $applicant->dob_nepali }}</td>
                                                            <td>{{ $applicant->created_at }}</td>
                                                            <td><span class="badge bg-info-subtle text-info">{{ $applicant->applicant_exam_status }}</span></td>
                                                            <td>{{  $applicant->symbol_number }}</td>
                                                            <td>
                                                                <a href="{{ route('sachiv.applicant.show', ['id' => $applicant->id]) }}"><span class="badge bg-success-subtle text-info">View</span></a>
                                                
                                                            </td>
                                                        </tr>

                                                        @endforeach
                                                     
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                                <div style="padding: 10px; float:right;">
                                                {{  $applicants->appends(request()->query())->links('admin.layout.pagination') }}
                                                </div>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                   

@endsection