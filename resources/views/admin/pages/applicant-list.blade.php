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
                                <div class="card">
                               
                                    <form action="{{ isset($isAdmit)  ?  route('applicant.admit.list') : route('applicant.index') }}"  method="GET" novalidate>
                                        <div class="row" style="padding: 20px 10px 0px 10px;"> 
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">                                   
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="full_name_english" value="{{ isset($request) ? $request->get('full_name_english') : '' }}">
                                                </div>
                                            </div> 
                                            <div class="col-lg-2 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Citizenship Number" name="citizenship_number" value="{{ isset($request) ? $request->get('citizenship_number') : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_nepali" value="{{ isset($request) ? $request->get('dob_nepali') : '' }}">
                                                </div>
                                            </div>
                                              <div class="col-lg-2 col-md-2 col-sm-6"> 
                                                <div class="mb-3">
                                                       <select class="form-select mb-3" name="status">
                                                            <option value="{{ isset($request) ? $request->get('status') : '' }}" selected>{{ isset($request) ? $request->get('status') : '' }}</option>
                                                            <option value="NEW">New Applied</option>
                                                            <option value="PROGRESS">Progress</option>
                                                            <option value="REJECTED">Rejected</option>
                                                            <option value="APPROVED">Approved</option>
                                                            <option value="READY-FOR-ADMIT-CARD"> Ready for admit card </option>
                                                            <option value="GENERATED"> Admit Card Generated </option>
                                                        </select>
                                                </div>
                                            </div>
                                             <div class="col-lg-2 col-md-2 col-sm-6"> 
                                                <div class="mb-3">
                                                       <select class="form-control select2" name="exam_center" data-toggle="select2">
                                                            <option value="">Search Exam Center Wise</option>
                                                        @foreach($provinces as $province)
                                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-6"> 
                                                <button class="btn btn-primary" type="submit">Search</button>
                                             </div>
                                        </div>
                                      
                                       
                                    </form>
                                </div>     

                        

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
                                                            <th>{{isset($isAdmit) ?  'Symbol Number' : 'Date of birth' }}</th>
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
                                                            <td>{{ $applicant->citizenship_number}}</td>
                                                            <td>
                                                              {{ \Carbon\Carbon::parse($applicant->applicant_exam_created_at)->setTimezone('Asia/Kathmandu')->format('Y-m-d H:i:s') }}
                                                            </td>
                                                            <td><span class="badge bg-info-subtle text-info">{{ $applicant->applicant_exam_status }}</span></td>
                                                            <td>{{ isset($isAdmit) ? $applicant->symbol_number : $applicant->dob_nepali }}</td>
                                                            <td>
                                                                <a href="{{ route('applicant.show', ['id' => $applicant->id]) }}"><span class="badge bg-success-subtle text-info">View</span></a>
                                                                <a href="{{ route('applicant.format', ['id' => $applicant->id]) }}"><span class="badge bg-success-subtle text-info">Format View</span></a>
                                                                 @if($applicant->symbol_number)
                                                                   <a href="{{ route('applicant.admit', ['id' => $applicant->id]) }}"><span class="badge bg-info-subtle text-info">Print Admit Card</span></a>
                                                                 @endif
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