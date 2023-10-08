
@extends('admin.layout.app')

@section('content')

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="profile-bg-picture"
                                style="background-image:url('assets/images/bg-profile.jpg')">
                                <span class="picture-bg-overlay"></span>
                                <!-- overlay -->
                            </div>
                            <!-- meta -->
                            <div class="profile-user-box">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="profile-user-img"><img src="{{ isset($applicant->documents) ? getImage($applicant->documents->where('document_name', 'profile')->pluck('path')->first()) : imageNotFound() }}" alt=""
                                                class="avatar-lg rounded-circle"></div>
                                        <div class="">
                                            <h4 class="mt-4 fs-17 ellipsis">{{ $applicant->full_name_english }}</h4>
                                            <p class="font-13"> {{ $applicant->email }}</p>
                                            <p class="text-muted mb-0 text-capitilize"><small>{{ $applicant->tole }} {{ $applicant->ward_no }}  {{ $applicant->municipality->name }}, {{ $applicant->district->name }}  {{ $applicant->province->name }}   </small></p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <a href= {{ route('student.personalForm') }} class="btn btn-soft-danger">
                                                <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                                Edit Profile
                                            </a>
                                          
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card p-0">
                                <div class="card-body p-0">
                                    <div class="profile-content">
                                        <ul class="nav nav-underline nav-justified gap-0">
                                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                    data-bs-target="#aboutme" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true" href="#aboutme">About</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#projects" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#projects">Qualification</a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#user-activities" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#user-activities">Activities</a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#edit-profile" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#edit-profile">Settings</a></li>
                                            
                                        </ul>

                                        <div class="tab-content m-0 p-4">
                                            <div class="tab-pane active" id="aboutme" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="profile-desk">
                                                    <h5 class="text-uppercase fs-17 text-dark">{{ $applicant->full_name_nepali }} | {{ $applicant->full_name_english }}</h5>

                                                    
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-lg-6 col-md-6">
                                                            <h5 class="mt-4 fs-17 text-dark">Contact Information</h5>
                                                             <table class="table table-condensed mb-0 border-top">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Date of birth</th>
                                                                        <td>
                                                                            <a href="#" class="ng-binding">
                                                                                {{ $applicant->dob_nepali }} B.S.  |  {{ $applicant->dob_english }} A.D.
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Email</th>
                                                                        <td>
                                                                            <a href="" class="ng-binding">
                                                                                {{ $applicant->email }}
                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">Phone</th>
                                                                        <td class="ng-binding">{{ $applicant->contact_number }} | {{ $applicant->phone_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Address</th>
                                                                        <td>
                                                                            <a href="#" class="ng-binding">
                                                                               {{ $applicant->tole }} {{ $applicant->ward_no }}  {{ $applicant->municipality->name }}, {{ $applicant->district->name }}  {{ $applicant->province->name }}
                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                             </table>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-6 col-md-6">
                                                             <h5 class="mt-4 fs-17 text-dark">Family Information</h5>
                                                             <table class="table table-condensed mb-0 border-top">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Grand Father Name</th>
                                                                        <td>
                                                                            <a href="#" class="ng-binding">
                                                                                {{ $applicant->familyInformation->grandfather_name_nepali }} |
                                                                                {{ $applicant->familyInformation->grandfather_name_english }}
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Father Name</th>
                                                                        <td>
                                                                            <a href="" class="ng-binding">
                                                                                 {{ $applicant->familyInformation->father_name_nepali }} |
                                                                                {{ $applicant->familyInformation->father_name_english }}
                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row">Mother Name </th>
                                                                        <td class="ng-binding">
                                                                              {{ $applicant->familyInformation->mother_name_nepali }} |
                                                                              {{ $applicant->familyInformation->mother_name_english }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Spouse </th>
                                                                        <td>
                                                                            <a href="#" class="ng-binding">
                                                                                {{ $applicant->familyInformation->spouse  }} |
                                                                                {{ $applicant->familyInformation->citizenship_number }}
                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                             </table>
                                                        </div>
                                                    </div>
                                                   
                                                </div> <!-- end profile-desk -->
                                            </div> <!-- about-me -->

                                              <!-- profile -->
                                            <div id="projects" class="tab-pane">
                                                <div class="row m-t-10">
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
                                                            <th>Date of birth</th>
                                                            
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
                                                            <td>
                                                             <div class="album">
                                                                  @foreach ($qualication->documents as $document)
                                                                    <a href="#">
                                                                        <img alt="" src="{{ getImage($document->path) }}" width="100" class="ml-2">
                                                                    </a>
                                                               @endforeach
                                                            </div>
                                                            
                                                            </td>

                                                        </tr>
                                                        @endforeach
    
                                                    </tbody>
                                                                    
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Activities -->
                                            <div id="user-activities" class="tab-pane">
                                                <div class="timeline-2">
                                                @foreach($applicant->logs as $log)
                                                    <div class="time-item">
                                                        <div class="item-info ms-3 mb-3">
                                                            <div class="text-muted">{{ $log->created_at->timezone('Asia/Kathmandu')->format('Y-m-d H:i:s') }}</div>
                                                            <p><strong><a href="#" class="text-info" style="text-transform: capitalize;">{{ $applicant->full_name_english }}</a> </strong>{{ $log->status }}</p>
                                                            <p>{{ $log->remarks }} </p>
                                                          
                                                        </div>
                                                    </div>
                                                @endforeach

                                                     

                                                  

                                                 
                                                </div>
                                            </div>

                                            <!-- settings -->
                                            <div id="edit-profile" class="tab-pane">
                                                <div class="user-profile-content">
                                                    <form method="POST" action="{{ route('applicant.status', ['id' => $applicant->id]) }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="row row-cols-sm-2 row-cols-1">
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label" for="AboutMe">Remarks</label>
                                                                <textarea style="height: 125px;" id="AboutMe"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12 mb-2">
                                                                <label class="form-label" for="validationCustom01">Status</label>
                                                                <select class="form-select mb-3" name="status" required>
                                                                        <option selected>Please Select</option>
                                                                        <option value="APPROVED">APPROVE</option>
                                                                        <option value="REJECTED">REJECTED</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit"><i
                                                                class="ri-save-line me-1 fs-16 lh-1"></i> Save</button>
                                                    </form>
                                                </div>
                                            </div>

                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

@endsection
