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
                    
                        

                        <div class="row">
                       

                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('qualification.create') }}" class="btn btn-primary" style="color: white;">Create New Qualification</a>
                                            </div>
                                            <h5 class="header-title mb-0">Qualification Information</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>University</th>
                                                            <th>Name</th>
                                                            <th>Level</th>
                                                            <th>Passed Year</th>
                                                            <th>Division</th>
                                                            <th>Percentage</th>
                                                            <th>Documents</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         @foreach($qualifications as $qualication)
                                                        <tr>
                                                            <td>{{ $qualication->university_name }}</td>
                                                            <td>{{ $qualication->name }}</td>
                                                            <td>{{ $qualication->type }}</td>
                                                            <td>{{ $qualication->passed_year }}</td>
                                                            <td>{{ $qualication->division }}</td>
                                                            <td>{{ $qualication->percentage }}</td>
                                                            <td>
                                                             <div class="album">
                                                                  @foreach ($qualication->documents as $document)
                                                                    <a href="#">
                                                                        <img alt="" src="{{ getImage($document->path) }}" width="100" class="ml-2">
                                                                    </a>
                                                               @endforeach
                                                            </div>
                                                            
                                                            </td>

                                                        
                                                       
                                                            <td><a href="{{ route('qualification.edit', ['id' => $qualication->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                            <form id="delete-form-{{ $qualication->id }}" action="{{ route('qualification.destroy', ['id' => $qualication->id]) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{$qualication->id }}').submit();">
                                                                <span class="badge bg-danger-subtle text-danger">Delete</span>
                                                            </a>
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