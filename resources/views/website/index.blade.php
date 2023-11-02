
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
                                          <div style="text-align: center;">
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/I6F-UdZECRU?si=v90PxtOOM_ibX5pn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </div>
                                        <div class="col-11 mt-5">
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
                                                             <span style="color: red;">Please upload images files only, pdf will not supported.</span>
                                                             <strong>Profile Photo:</strong>  <br />
                                                             <strong>Citizenship Front and Back:</strong>  <br />
                                                             <strong>Lapche: </strong>  <br/> 
                                                             <strong>Signature </strong>  <br/> 
                                                             <strong>Transcript </strong>  <br/>
                                                             <strong>Character </strong>  <br/> 
                                                             <strong>Provisional (if availble) </strong>  <br/> 
                                                             <strong>Payment Voucher (Online or Voucher Image) </strong>  <br/> 
                                                             <strong>Licence Image for Pleader </strong>  <br/> 
                                                            
                                                        </p>
                                                    </div>
                                                </div> <!-- end col -->

                                                 <div class="col-md-12">
                                                    <div>
                                                        <div class="faq-question-q-box">Q.</div>
                                                        <h4 class="faq-question">How can i fill my Pleader Licence?</h4>
                                                        <p class="faq-answer mb-4">
                                                           If you hold a pleader's license, you need to provide your Personal Information and Guardian Information. 
                                                           After that, on the Qualification page, you should click on the create new qualifications. If you do not possess any details for the fields, you must specify "pleader" in all the fields. 
                                                           Additionally, you should select "pleader" as your type and upload an image of your license. 
                                                       </p>
                                                    </div>
                                                </div> <!-- end col -->

                                                <div class="col-md-12">
                                                    <div>
                                                        <div class="faq-question-q-box">Q.</div>
                                                        <h4 class="faq-question">I am not receiving any otp code?</h4>
                                                        <p class="faq-answer mb-4">
                                                           If you haven't received an OTP code, please wait for an hour. Afterward, attempt to log in. 
                                                           If it indicates that your account hasn't been activated, kindly click on the "Click Here" link. 
                                                       </p>
                                                    </div>
                                                </div> <!-- end col -->

                                                 <div class="col-md-12">
                                                    <div>
                                                        <div class="faq-question-q-box">Q.</div>
                                                        <h4 class="faq-question">How can I review my account?</h4>
                                                        <p class="faq-answer mb-4">
                                                            Click on the icon located in the top right corner, associated with the applicant's name. From there, select "My Account," which will redirect you to your profile. Here, you can view your activities, details, and qualifications
                                                       </p>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end-row -->
                                        </div>
                                    </div>

                                </div>
                            </div>

@endsection