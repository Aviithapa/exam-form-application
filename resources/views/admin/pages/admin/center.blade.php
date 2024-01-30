@extends('admin.layout.app')

@section('content')
  <style type="text/css" media="print">
    /* Define the styles for printing */
    @page {
        size: auto; /* Default page size */
        margin: 0; /* No margin for the page */
    }
    body {
        margin: 0; /* No margin for the body */
        background: white;
    }
    .print-section {
        margin: 20px;
        /* Define the styles for the section you want to print */
        /* You can hide other elements by setting display: none; */
    }
    </style>
      <div class="row">
                        <div class="col-sm-12">
                            <div class="card p-0">
                                <div class="card-body p-0">
                                    <div class="col-sm-6 d-print-none">
                                        <div class="d-flex justify-content-start align-items-center gap-2"  style="padding: 20px">
                                            <a href="#" onclick="javascript:window.print()" class="btn btn-soft-danger">
                                                <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                                Print Student Details
                                            </a>
                                        </div>
                                    </div> 

                                    <div class="content" id="printContent">
                                         <table  
                                                 id="alternative-page-datatable"
                                                class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Roll Number</th>
                                                            <th>Name Nepali</th>
                                                            <th>Name English</th>
                                                            <th>Date of Birth</th>
                                                            <th>Photo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       @foreach($applicants as $key =>  $applicant)
                                                            
                                                            <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $applicant->symbol_number }}</td>
                                                            <td>{{ $applicant->applicant->full_name_nepali }}</td>
                                                            <td>{{ $applicant->applicant->full_name_english }}</td>
                                                            <td>{{ $applicant->applicant->dob_nepali }}</td>
                                                            <td>
                                                                <img width="50px;" height="50px" src="{{ isset($applicant->applicant->documents) ? getImage($applicant->applicant->documents->where('document_name', 'profile')->pluck('path')->first()) : imageNotFound() }}">
                                                            </td>
                                                          
                                                        
                                                        </tr>

                                                        @endforeach
                                                     
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
      </div>
    
  

@endsection

@push('scripts')
    <script>
        function printDiv() {
            var divContents = document.getElementById("printContent");
            var a = window.open('', 'PRINT ADMIT CARD', 'height=800, width=800');

            a.document.write(divContents.outerHTML);
            

        }
    </script>
    @endpush
