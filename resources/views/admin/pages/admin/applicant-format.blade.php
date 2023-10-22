
@extends('admin.layout.app')

@section('content')

                
                    

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card p-2 mt-5">
                                <div class="row">
                               <div class="col-sm-8" style="text-align: center; padding-left: 100px;">
                                 <span style="text-align: right !important;">
                                    अनुशाचु 1 <br/>
                                  अबेदान  फरम
                                  Nepal Bar Council
                                 </span>
                               </div>
                               <div class="col-sm-4" style="text-align: right;">
                                
                                    <img src="{{ isset($applicant->documents) ? getImage($applicant->documents->where('document_name', 'profile')->pluck('path')->first()) : imageNotFound() }}" alt=""
                                                class="avatar-lg" onclick="onClick(this)" >
                              
                                </div>
            
                                    <div class="col-sm-12 mt-2" style="display: flex; justify-content: space-between;"> 
                                            <span>Registration Date : {{ isset($voucherData) ? carbon($voucherData->created_at) : '' }}</span>
                                            <span>Registration Number: {{ $applicant->id }}</span>
                                            <span>Roll Number: {{ isset($voucherData) ? $voucherData->symbol_number : ''}}</span>
                                    </div>
                                     <div class="col-sm-12 mt-2" style="display: flex; justify-content: space-between;"> 
                                            Student Personal Details
                                    </div>
                                     <div class="col-sm-12 mt-2" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000; "> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                पूरा नाम थार
                                              </div>
                                               <div class="col-sm-10">
                                                 <div> 
                                                   देवनागरीकम | {{ $applicant->full_name_nepali }}
                                                 </div>
                                                    <hr />
                                                  <div> 
                                                 <span> Block Letter </span> | {{ $applicant->full_name_english }}
                                                 </div>
                                                  
                            
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                                      <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000;"> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding: 20px 10px; justify-content: center;">
                                                 स्थायी ठेगाना
                                              </div>
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                {{ $applicant->province->name }}
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                               {{ $applicant->district->name }} 
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                               {{ $applicant->municipality->name }}
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                {{ $applicant->ward_no }}
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; padding-left: 10px; justify-content: center;">
                                               {{ $applicant->tole }}
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                                     <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000; "> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                जन्म मिति
                                              </div>
                                               <div class="col-sm-5" style="padding-top:10px; padding-bottom:10px;">
                                                 <div> 
                                                   B.S | {{ $applicant->dob_nepali }}
                                                 </div>
                                                    <hr />
                                                  <div> 
                                                    A.D | {{ $applicant->dob_english }}
                                                 </div>
                                              </div>
                                                <div class="col-sm-5"  style="padding-top:10px; padding-bottom:10px;">
                                                 <div> 
                                                   Citizenship issued district / year | {{ $applicant->issued_district}}
                                                 </div>
                                                    <hr />
                                                  <div> 
                                                 <span> Citizenship Number </span> | {{ $applicant->citizenship_number}}
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                                     <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000;"> 
                                           <div class="row">
                                              <div class="col-sm-4" style="align-items: center; display:flex; border-right:1px solid #000; padding: 20px 10px; justify-content: center;">
                                                Contact Number : {{ $applicant->contact_number }}
                                              </div>
                                              <div class="col-sm-4 " style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                               Phone Number : {{ $applicant->phone_number }}
                                              </div>
                                               <div class="col-sm-4 " style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                               Email : {{ $applicant->email }} 
                                              </div>
                                             
                                           </div>
                                        </div>
                                    </div>
                                      <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000;"> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding: 20px 10px;">
                                                पेशा : {{ $applicant->working }}
                                              </div>
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                लिङ्ग : {{ $applicant->gender }}
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                               धर्म : {{ $applicant->religion }} 
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                मातृभाषा : {{ $applicant->mother_tongue }}
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                जाति : {{ $applicant->caste }}
                                              </div>
                                           </div>
                                        </div>
                                    </div>

                                      <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000; "> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000;  justify-content: center;">
                                                  यदि काम गर्ने कार्यालयको नाम
                                              </div>
                                               <div class="col-sm-10" style="padding: 10px;">
                                                 {{ $applicant->office_name }}
                                              </div>
                                           </div>
                                        </div>
                                    </div>

                                        <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000; "> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                आमा को नाम थार
                                              </div>
                                               <div class="col-sm-10">
                                                 <div> 
                                                   देवनागरीकम | {{ $applicant->familyInformation->mother_name_nepali }}
                                                 </div>
                                                    <hr />
                                                  <div> 
                                                 <span> Block Letter </span> | {{ $applicant->familyInformation->mother_name_english}}
                                                 </div>
                                                  
                            
                                              </div>
                                           </div>
                                        </div>
                                    </div>

                                      <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000; "> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                            
                                            बुबा को नाम थार
                                              </div>
                                               <div class="col-sm-10">
                                                 <div> 
                                                   देवनागरीकम | {{ $applicant->familyInformation->father_name_nepali }}
                                                 </div>
                                                    <hr />
                                                  <div> 
                                                 <span> Block Letter </span> | {{ $applicant->familyInformation->father_name_english}}
                                                 </div>
                                                  
                            
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                            <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000; "> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                            
                                            हजुरबुबा को नाम थार
                                              </div>
                                               <div class="col-sm-10">
                                                 <div> 
                                                   देवनागरीकम | {{ $applicant->familyInformation->grandfather_name_nepali }}
                                                 </div>
                                                    <hr />
                                                  <div> 
                                                 <span> Block Letter </span> | {{ $applicant->familyInformation->grandfather_name_english}}
                                                 </div>
                                                  
                            
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                            </div>

                             <div class="col-sm-12" style="display: flex; justify-content: space-between;"> 
                                        <div style="width: 100%; border: 1px solid #000;"> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding: 20px 10px; justify-content: center;">
                                                विवाहित भयेको मा
                                              </div>
                                              <div class="col-sm-5" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                {{ $applicant->familyInformation->spouse }}
                                              </div>
                                               <div class="col-sm-5" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                               {{ $applicant->familyInformation->citizenship_number }} 
                                              </div>
                                               
                                           </div>
                                        </div>
                                    </div>

                                        <div class="row mt-5">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <thead>
                                                                   <tr>
                                                          
                                                            <th>Name</th>
                                                            <th>Level</th>
                                                            <th>Passed Year</th>
                                                            <th>Division</th>
                                                            <th>Percentage</th>
                                                            
                                                            
                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                     @foreach($applicant->qualifications as $qualication)
                                                                    
                                                        <tr>
                                             
                                                            <td>{{ $qualication->name }}</td>
                                                            <td>{{ $qualication->type }}</td>
                                                            <td>{{ $qualication->passed_year }}</td>
                                                            <td>{{ $qualication->division }}</td>
                                                            <td>{{ $qualication->percentage }}</td>

                                                        </tr>
                                                        @endforeach
    
                                                    </tbody>
                                                                    
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                           
                         </div>
                        </div>
                    </div>
                    <!-- end page title -->

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

