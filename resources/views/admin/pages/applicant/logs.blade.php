@extends('admin.layout.app')

@section('content')
 <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nepal Bar Council</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Applicant Logs</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Applicant Log</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                    
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body">

                                            <div class="timeline-2">
                                                 @foreach($logs as $log)
                                                    <div class="time-item">
                                                        <div class="item-info ms-3 mb-3"  style="color: {{ ($log->status == 'REJECTED') ? 'red' : ''}}">
                                                            <div class="text-muted"  style="color: {{ ($log->status == 'REJECTED') ? 'red !important' : ''}}">{{ $log->created_at->timezone('Asia/Kathmandu')->format('Y-m-d H:i:s') }}</div>
                                                            <p><strong><a href="#" class="text-info" style="text-transform: capitalize;"></a> </strong>{{ $log->status }}</p>
                                                            <p >{{ $log->remarks }} </p>
                                                          
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </div>

                                     </div>
                                </div>


@endsection