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

                         <div class="card">
                               
                                    <form action="{{  route("accounts.index") }}"  method="GET" novalidate>
                                        <div class="row" style="padding: 20px 10px 0px 10px;"> 
                                            
                                            <div class="col-lg-4 col-md-4 col-sm-6"> 
                                                <div class="mb-3">                                   
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name" value="{{ isset($request) ? $request->get('name') : '' }}">
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 col-md-4 col-sm-6"> 
                                                <div class="mb-3">
                                                    <input type="email" class="form-control" id="validationCustom01" placeholder="Email" name="email" value="{{ isset($request) ? $request->get('email') : '' }}">
                                                </div>
                                            </div>
                                             
                                              <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                       <select class="form-select mb-3" name="account_status">
                                                            <option value="{{ isset($request) ? $request->get('account_status') : '' }}" >{{ isset($request) ? $request->get('account_status') : 'Search by status' }}</option>
                                                            <option value="{{true}}">Approved</option>
                                                            <option value="{{ false }}">Pending</option>
                                               
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
                                            <h5 class="header-title mb-0">User List With Voucher</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Contact Number</th>
                                                            <th>Bank Name</th>
                                                            <th>Ammount</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($applicants as $user)
                                                        <tr>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->contact_number }}</td>
                                                            <td>{{ $user->bank_name }}</td>
                                                            <td>{{ $user->total_amount }}</td>

                                                            <td>
                                                                <img src="{{ isset($user->applicant->documents) ? getImage($user->applicant->documents->where('document_name', 'voucher')->pluck('path')->first()) : imageNotFound() }}" alt="Voucher Image" width="100" onclick="onClick(this)" >
                                                            </td>
                                                        
                                                            <td><a href="{{ route('accounts.approve', ['id' => $user->id]) }}"><span class="badge bg-info-subtle text-info">Approve</span></a>
                                                            
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                   <div style="padding: 10px; float:right;">
                                                {{-- {{  $users->appends(request()->query())->links('admin.layout.pagination') }} --}}
                                                </div>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                          <style>
                                                    .modal-body {
                                                        max-height: 80vh;
                                                        overflow-y: auto;
                                                        max-width: 100vh;
                                                    }
                                                </style>
                                                <div class="modal" id="modal01">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" onclick="$('#modal01').css('display','none')" class="close"  aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="img01" style="max-width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

@endsection


@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>

        $(document).ready(function () {

            $('body').on('click', '#editCompany', function (event) {

                event.preventDefault();
                var id = $(this).data('id');
                $("#idkl").val( id );
            });
            $('body').on('click', '#editCompanyModel', function (event) {

                event.preventDefault();
                var id = $(this).data('id');
                $("#idkl123").val( id );
            });

        });
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }

    </script>
@endpush