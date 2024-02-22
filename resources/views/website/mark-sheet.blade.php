
@extends('website.layout.app')

@section('content')
<style>
    #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-body">
                                <h4 class="card-title text-center">नेपाल कानून व्यवसायी परिषद</h4>
                                <p class="card-text text-center">३१ औं अधिवक्ता परीक्षा</p>
                                        <div class="col-sm-6" style="margin:0px 20%;">
                                            <h4 class="card-title text-center">Marksheet</h4>
                                            <h2 class="card-text">{{ $matchingApplicants->full_name_english }}</h2>
                                            <h4 class="card-text">Roll Number : {{  $matchingApplicants->symbol_number }} </h4>
                                            <h4 class="card-text">Date Of Birth : {{  $matchingApplicants->dob_nepali }}</h4>

                                            <table id="customers"> 
                                                <thead>
                                                    <tr>
                                                      <th>सि.न.</th>
                                                      <th>विषय</th>
                                                      <th>पूर्ण अंक</th>
                                                      <th>उतीर्ण अंक</th>
                                                      <th>प्राप्त अंक</th>
                                                      <th>कैफियत</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <th>१</th>
                                                      <th>संविधान र कानून (बहुबैकल्पिक)</th>
                                                      <th>१००</th>
                                                      <th>५०</th>
                                                      <th>{{  $matchingApplicants->subject1 }}</th>
                                                      <th></th>

                                                    </tr>
                                                     <tr>
                                                      <th>२</th>
                                                      <th>मस्यौदा लेखन तथा अनुवाद</th>
                                                      <th>१००</th>
                                                      <th>५०</th>
                                                      <th>{{  $matchingApplicants->subject2 }}</th>
                                                      <th></th>

                                                    </tr>
                                                     <tr>
                                                      <th>५</th>
                                                      <th>मौखिक (अन्तरर्वाता) परीक्षा</th>
                                                      <th>२५</th>
                                                      <th>१०</th>
                                                      <th>-</th>
                                                      <th>-</th>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h4 class="card-text mt-4">नतिजा: : {{  $matchingApplicants->result }} </h4>
                                        </div>
                            </div> <!-- end card-->
                        </div> 
                       
                    </div>
                    <!-- end row -->
                      

@endsection