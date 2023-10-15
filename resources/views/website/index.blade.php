
@extends('website.layout.app')

@section('content')

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card card-body">
                                <h4 class="card-title">Start New Registartion</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="{{ route('register.index') }}" class="btn btn-primary">Start Registration</a>
                            </div> <!-- end card-->
                        </div> 
                        <div class="col-sm-6">
                            <div class="card card-body">
                                <h4 class="card-title">Access your Account</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="{{ url('/login') }}" class="btn btn-primary">Signup</a>
                            </div> <!-- end card-->
                        </div> 
                    </div>
                    <!-- end row -->
                       <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-center mt-4">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div>
                                                        <div class="faq-question-q-box">Q.</div>
                                                        <h4 class="faq-question" data-wow-delay=".1s">Are you a new applicant to apply for council exam?</h4>
                                                        <p class="faq-answer mb-4"> The first step is to create your account. Simply click on the "Start Registration" button, and you'll be directed to a form where you need to provide your name, email address, and password. After filling out the necessary details, you'll receive an account activation code in your email. If you don't receive the email, feel free to contact us at 9867739191 for assistance. 
                                                            !</p>
                                                    </div>
                                                </div> <!-- end col -->
                                                <div class="col-md-12">
                                                    <div>
                                                        <div class="faq-question-q-box">Q.</div>
                                                        <h4 class="faq-question">How can i fill the online form?</h4>
                                                        <p class="faq-answer mb-4">
                                                            Once you've successfully created your new account, the next step is to log in. Inside your account, you'll find three important sections to complete:<br />
                                                            <strong>Personal Information:</strong> Here, you'll provide all the necessary details related to your personal information. <br />
                                                             <strong>Guardian Information:</strong> The second step is to fill out information regarding your guardians. <br />
                                                            <strong> Qualifications: </strong> Share details about your educational qualifications. <br/> 
                                                            After completing these sections, head over to your dashboard where you can upload the voucher. This marks your application for the council exam.
                                                            Expect a confirmation message to be sent to both your email and your dashboard. Once your application is approved, please allow up to 7 working days for the process to be completed. We're here to guide you through the steps towards your council exam journey. Good luck!   
                                                        </p>
                                                    </div>
                                                </div> <!-- end col -->
                                                 <div class="col-md-12">
                                                    <div>
                                                        <div class="faq-question-q-box">Q.</div>
                                                        <h4 class="faq-question">Which documents are required while filling the form?</h4>
                                                        <p class="faq-answer mb-4">
                                                             <strong>Profile Photo:</strong>  <br />
                                                             <strong>Citizenship Front and Back:</strong>  <br />
                                                             <strong>Lapche Left and Right: </strong>  <br/> 
                                                             <strong>Signature </strong>  <br/> 

                                                           
                                                        </p>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end-row -->
                                        </div>
                                    </div>

                                </div>
                            </div>

@endsection