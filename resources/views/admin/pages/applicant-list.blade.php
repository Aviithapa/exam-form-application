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
                                    <form class="needs-validation" novalidate>
                                        <div class="row" style="padding: 20px 10px 0px 10px;"> 
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">                                   
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="full_name_nepali">
                                                </div>
                                            </div> 
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Citizenship Number" name="full_name_english">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="YYYY-MM-DD" name="dob_nep">
                                                </div>
                                            </div>
                                              <div class="col-lg-2 col-md-2 col-sm-6"> 
                                                <div class="mb-3">
                                                       <select class="form-select mb-3" name="status">
                                                            <option selected>Status</option>
                                                            <option value="1">New Applied</option>
                                                            <option value="2">Approved</option>
                                                            <option value="3">Rejected</option>
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
                                            <h5 class="header-title mb-0">Total Number of Applicant</h5>
                                            @if(isset($isAdmit))
                                            <div class="d-flex justify-content-end align-items-center gap-2">
                                                <a href="{{ route('applicant.generateAdmitCard') }}" class="btn btn-soft-info">
                                                    <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                                        Generate Admit Card
                                                </a>
                                            </div>
                                            @endif
                                        
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
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $applicant->full_name_english }}</td>
                                                            <td>{{ $applicant->dob_nepali }}</td>
                                                            <td>{{ $applicant->created_at }}</td>
                                                            <td><span class="badge bg-info-subtle text-info">{{ $applicant->applicant_exam_status }}</span></td>
                                                            <td>{{ isset($isAdmit) ? $applicant->symbol_number : $applicant->dob_nepali }}</td>
                                                            <td>
                                                                <a href="{{ route('applicant.show', ['id' => $applicant->id]) }}"><span class="badge bg-success-subtle text-info">View</span></a>
                                                                 @if($applicant->symbol_number)
                                                                   <a href="{{ route('applicant.admit', ['id' => $applicant->id]) }}"><span class="badge bg-info-subtle text-info">Print Admit Card</span></a>
                                                                 @endif
                                                            </td>
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
                        <!-- end row -->

                   

@endsection