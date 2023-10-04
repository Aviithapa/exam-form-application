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
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Daily Visits</h6>
                                        <h2 class="my-2">8,652</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
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
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
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
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
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
                            </div> <!-- end col-->
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
                                                            <th>Assign</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Velonic Admin v1</td>
                                                            <td>01/01/2015</td>
                                                            <td>26/04/2015</td>
                                                            <td>26/04/2015</td>
                                                            <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Velonic Frontend v1</td>
                                                            <td>01/01/2015</td>
                                                            <td>26/04/2015</td>
                                                            <td>26/04/2015</td>
                                                            <td><span class="badge bg-info-subtle text-info">Released</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Velonic Admin v1.1</td>
                                                            <td>01/05/2015</td>
                                                            <td>10/05/2015</td>
                                                            <td>26/04/2015</td>
                                                            <td><span class="badge bg-pink-subtle text-pink">Pending</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Velonic Frontend v1.1</td>
                                                            <td>01/01/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td><span class="badge bg-purple-subtle text-purple">Work in Progress</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Velonic Admin v1.3</td>
                                                            <td>01/01/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td><span class="badge bg-warning-subtle text-warning">Coming soon</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Velonic Admin v1.3</td>
                                                            <td>01/01/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td>31/05/2015</td>
                                                            <td><span class="badge bg-primary-subtle text-primary">Coming soon</span></td>
                                                            <td>Techzaa Studio</td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Velonic Admin v1.3</td>
                                                            <td>01/01/2015</td>
                                                            <td>31/05/2015</td>
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