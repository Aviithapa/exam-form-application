@extends('admin.layout.app')

@section('content')

   <div class="content-page">

                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

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
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Citizenship Number</th>
                                                            <th>Applied Date</th>
                                                            <th>Status</th>
                                                            <th>Date of birth</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Velonic Admin v1</td>
                                                            <td>01/01/2015</td>
                                                            <td>26/04/2015</td>
                                                            <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                            <td>Techzaa Studio</td>
                                                            <td><span class="badge bg-success-subtle text-info">View</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Velonic Frontend v1</td>
                                                            <td>01/01/2015</td>
                                                            <td>26/04/2015</td>
                                                            <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Velonic Admin v1.1</td>
                                                            <td>01/05/2015</td>
                                                            <td>10/05/2015</td>
                                                            <td><span class="badge bg-pink-subtle text-pink">Pending</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Velonic Frontend v1.1</td>
                                                            <td>01/01/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td><span class="badge bg-purple-subtle text-purple">Work in Progress</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Velonic Admin v1.3</td>
                                                            <td>01/01/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td><span class="badge bg-warning-subtle text-warning">Coming soon</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Velonic Admin v1.3</td>
                                                            <td>01/01/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td><span class="badge bg-primary-subtle text-primary">Coming soon</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Velonic Admin v1.3</td>
                                                            <td>01/01/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td><span class="badge bg-danger-subtle text-danger">Cool</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
    
                                                    </tbody>
                                                </table>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

            </div>

@endsection