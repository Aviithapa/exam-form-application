@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nepal Bar Council</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Municipality</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                      <div class="card">
                               
                                    <form action="{{ route('municipalities.index') }}"  method="GET" novalidate>
                                        <div class="row" style="padding: 20px 10px 0px 10px;"> 
                                            
                                            <div class="col-lg-8 col-md-8 col-sm-8"> 
                                                <div class="mb-3">                                   
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name" value="{{ isset($request) ? $request->get('name') : '' }}">
                                                </div>
                                            </div> 
                                             
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-3" style="text-align:right; margin-right: 10px;"> 
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
                                                <a href="{{ route('municipalities.create') }}" class="btn btn-primary" style="color: white;">Create New Municipality</a>
                                            </div>
                                            <h5 class="header-title mb-0">Municipality</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>District Name</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($municipalities as $exam)
                                                        <tr>
                                                            <td>{{ $exam->id }}</td>
                                                            <td>{{ $exam->name }}</td>
                                                            <td>{{ $exam->district_name }}</td>
                                                            <td><a href="{{ route('municipalities.edit', ['municipality' => $exam->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                            <form id="delete-form-{{ $exam->id }}" action="{{ route('municipalities.destroy', ['municipality' => $exam->id]) }}" method="POST" style="display: none;">
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
                                                  <div style="padding: 10px; float:right;">
                                                {{  $municipalities->appends(request()->query())->links('admin.layout.pagination') }}
                                                </div>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>

@endsection