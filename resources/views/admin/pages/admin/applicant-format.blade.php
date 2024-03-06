
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
          page-break-after: always;
    }
    .qualification{
      margin-top: 10px;
    page-break-after: auto;
    }
    .break-before {page-break-before: always;}
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


                    <div class="print-section">

                    <div class="row" style="font-weight: 600">
                        <div class="col-sm-12">
                            <div>
                                <div class="row">
                                  <div class="col-sm-12" style="text-align: center; font-weight:600;">
                                    <h3>
                                    अनुसूची १ <br/>
                                    आवेदन फारम <br/>
                                   नेपाल कानून व्यवसायी परिषद </h3>
                                  </div>
                               <div class="col-sm-8" style="text-align: center; padding-left: 100px;">
                                
                               </div>
                               <div class="col-sm-4" style="text-align: right;">
                                
                                    <img src="{{ isset($applicant->documents) ? getImage($applicant->documents->where('document_name', 'profile')->pluck('path')->first()) : imageNotFound() }}" alt=""
                                                class="avatar-lg" onclick="onClick(this)" >
                              
                                </div>
            
                                    <div class="col-sm-12 mt-2" style="display: flex; justify-content: space-between; border: 1px solid black;"> 
                                            <span>Registration Date : {{ isset($voucherData) ? carbon($voucherData->created_at) : '' }}</span>
                                            <span>Registration Number: {{ $applicant->id }}</span>
                                            <span>Roll Number: {{ isset($voucherData) ? $voucherData->symbol_number : ''}}</span>
                                    </div>
                                     <div class="col-sm-12 mt-2" style="display: flex; justify-content: space-between;"> 
                                            Student Personal Details
                                    </div>
                                     <div class="col-sm-12 mt-2" style="display: flex; justify-content: space-between; "> 
                                        <div style="width: 100%; border: 1px solid #000; height:100px;"> 
                                           <div class="row">
                                              <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                पूरा नाम थर
                                              </div>
                                               <div class="col-sm-10">
                                                 <div style="padding-top: 15px;"> 
                                                   देवनागरिक | {{ $applicant->full_name_nepali }}
                                                 </div>
                                                    <hr />
                                                  <div style="padding-bottom: 15px;"> 
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
                                              {{ $applicant->district->name }}  District
                                                
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                               {{ $applicant->municipality->name }}
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; border-right:1px solid #000; padding-left: 10px; justify-content: center;">
                                                {{ $applicant->ward_no }} <br /> Ward
                                              </div>
                                               <div class="col-sm-2" style="align-items: center; display:flex; padding-left: 10px; justify-content: center;">
                                               {{ $applicant->tole }} <br /> Tole
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
                                                 <div style="padding-top:10px;"> 
                                                   B.S | {{ $applicant->dob_nepali }}
                                                 </div>
                                                    <hr />
                                                  <div style="padding-bottom:10px;"> 
                                                    A.D | {{ $applicant->dob_english }}
                                                 </div>
                                              </div>
                                                <div class="col-sm-5"  style="padding-top:10px; padding-bottom:10px;">
                                                 <div style="padding-top:10px;"> 
                                                   Citizenship issued district / year | {{ $applicant->issued_district}}
                                                 </div>
                                                    <hr />
                                                  <div style="padding-bottom:10px;"> 
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
                                                आमाको नाम थर 
                                              </div>
                                               <div class="col-sm-10">
                                                 <div style="padding-top:10px;"> 
                                                   देवनागरिक | {{ $applicant->familyInformation->mother_name_nepali }}
                                                 </div>
                                                    <hr />
                                                  <div style="padding-bottom:10px;"> 
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
                                            
                                          बुबाको नाम थर 
                                              </div>
                                               <div class="col-sm-10">
                                                                                                 <div style="padding-top:10px;"> 

                                                   देवनागरिक | {{ $applicant->familyInformation->father_name_nepali }}
                                                 </div>
                                                    <hr />
                                                   <div style="padding-bottom:10px;"> 
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
                                            
                                           हजुरबुबाको नाम थर 
                                              </div>
                                               <div class="col-sm-10">
                                                                                                <div style="padding-top:10px;"> 

                                                   देवनागरिक | {{ $applicant->familyInformation->grandfather_name_nepali }}
                                                 </div>
                                                    <hr />
                                          <div style="padding-bottom:10px;"> 
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
                                            बिबाहित भएको हकमा
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

                                        <div class="row mt-5 qualification">
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
                    @if(isset($exam))
                    <div class="row break-before" style="width:100%;">
                                            <div class="col-lg-12 m-b-3">
                                                <div class="box box-info">
                                                    <div class="box-header with-border p-t-1">
                                                            <div class="col-lg-4">
                                                           </div>
                                                            <div class="col-lg-8 text-center align-content-center" style=" text-align: center; margin: auto;width: 60%; line-height: 0.4;">
                                                            <h1  style = "color: #003893 !important; 
                                                            font-size:36px; 
                                                            font-weight: bold; 
                                                            word-spacing: 2px; font-family:Aerial; margin-top: 20px; " class="box-title text-black">नेपाल कानून व्यवसायी परिषद</h1>
                                                            <h3  style = "font-family:Aerial; line-height:1.6; margin-top: -5px;" class="box-title  text-black">३१ औं अधिवक्ता परीक्षा</h3>
                                                            
                                                            <h4  style = "font-size: 30px; text-decoration: underline; font-family:Aerial" class="box-title text-black">प्रवेश पत्र</h4>
                                                             <div style="margin-top: -180px; margin-left: 130px; z-index: 1000;position: absolute; height: 50px">
                                                                                <img src="{{ asset('assets/images/stamp.png') }}" class="signature" width="150px" height="150px">
                                                                            </div>

                                                            </div>
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body container mt-2">
                                                    
                                                        
                                                        <div class="student-admit-card-body" style="border: 1px solid #000; padding: 20px;height: 300px; font-size: 12px;">
                                                            <div class="row" style="width:100%;     display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;">
                                                                <div class="col-lg-7" style="-webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: 58.33333333%;">
                                                                    <div style="width:100%; float: left; line-height:1.2;">

                                                                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(80)->generate('Name : '.$applicant->full_name_english. ' Dob' . $applicant->dob_english )!!}

                                                                        <p style="font-size: 16px; font-weight: 600;">रोल नम्बर:<span style="padding-left:1em;">:
                                                                                    {{ $exam->symbol_number  }}
                                                                        </span></p>
                                                                            <p style="font-size: 16px;">परीक्षार्थीको नामः<strong><span style="padding-left:1em;">: {{ $applicant->full_name_nepali }} |  {{ $applicant->full_name_english }} </span></strong><br />
                                                                               <p style="font-size: 16px;">  परीक्षा केन्द्र: <span style="padding-left:1em;">: {{ isset($exam->province_id) ? $exam->province->name : '' }}</span> </p>
                                                                                </p>
                                                                                <p style="font-size: 14px; font-weight: 600;">
                                                                                <strong><U>विषय</U> </strong> <br />
                                                                                   <span> १. संविधान र कानून </span>     <span style="margin-left: 5px;"> २. मस्यौदा लेखन तथा अनुवाद </span>
                                                                             
                                                                                </p>
                                                                            
                                                                                <div style="float:left;">परीक्षार्थीको हस्ताक्षर : <br>
                                                                                    <div style="border-width: 1px; height: 40px; width:300px; border-style: dashed;"></div>
                                                                                </div>
                                                                        </span></div>
                                                                </div>
                                                                <div class="col-lg-3" style="    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: 25%;">
                                                                    <div style="width: 20%; float: left;">
                                                                         <div style="margin-top: -100px; margin-left: 70px; z-index: 1000;position: absolute; height: 50px">
                                                                                <img src="{{ asset('assets/images/stamp.png') }}" class="signature" width="150px" height="150px">
                                                                            </div>
                                                                        <div style="display:flex;">

                                                                            <img width="160px" height="180px" src="{{ isset($applicant->documents) ? getImage($applicant->documents->where('document_name', 'profile')->pluck('path')->first()) : imageNotFound() }}">
                                                                           

                                                                        </div>

                                                                        <div style="height:50px;  float:left; padding-left: 8%; padding-right: 8%;">
                                                                        
                                                                        </div>
                                                                        <div style="padding-left: 0%; padding-top: 10px; " class="mt-5">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                  
                                                            </div>
                                                            


                                                        </div>

                                                        <div class="" style="margin-top: 1rem;">
                                                            <div class="row" style="font-size: 16px; margin-left: 20px;">
                                                                <h5><strong class="text-bold" style="font-size: 16px;">परीक्षार्थीले पालना  गर्नुपर्ने नियमहरु :</strong></h5>
                                                            </div>
                                                            <div class="row" style="font-size: 12px; margin-left: 20px; line-height: 1.3;">
                                                               
                                                           <p> १. परीक्षार्थीले परीक्षा केन्द्रमा परीक्षा दिन आउँदा प्रवेशपत्र र लेख्ने कलम वाहेक अन्य कुनै पनि
                                                            सामग्री ल्याउन पाईने छैन । प्रवेशपत्र बिना परीक्षामा समावेश गराइने छैन । </p>
                                                            <p>२. परीक्षार्थीले परीक्षा हल भित्र Mobile, Calculator, Bluetooth, I-Pad, Earphones, Smart watch जस्ता
                                                            कुनै पनि Electronic उपकरण तथा किताब, कापी, नोट, चिट, पर्स, झोला, स्केल, सिसाकलम आदि
                                                            ल्याउन पाउने छैन । यदि साथमा राखेको पाइएमा परीक्षाहलबाट तत्काल निष्कासन गरि सम्पूर्ण
                                                            परीक्षा रद्ध गरिनेछ । </p>
                                                           <p> ३. परीक्षा शुरु भएको आधा घण्टा भन्दा ढिलो आउने परीक्षार्थीलाई परीक्षामा सामेल गराइने छैन ।
                                                            परीक्षा सुरु भएको १ घण्टा अगावै परीक्षा हलबाट परीक्षार्थी बाहिर जान पाउने छैन । </p>
                                                           <p> ४. उत्तरपुस्तिकामा आफ्नो रोल नं. नलेखि खाली छाडेमा र अनावश्यक ठाउँमा आफ्नो परिचय खुल्ने
                                                            संकेत, नाम, रोल नं., मोवाईल नं. लगायत अनावश्यक कुरा लेखेको पाईएमा त्यस्ता परीक्षार्थीको
                                                            उत्तरपुस्तिका रद्ध गरिनेछ । </p>
                                                           <p> ५. परीक्षा हल भित्र निरीक्षक वा परीक्षामा खटिएका कर्मचारीसँग अनावश्यक वादविवाद गरेमा वा
                                                            तोकिएको स्थानमा नवसी आफु खुशी स्थान परिवर्तन गरेमा परीक्षाहलबाट तत्काल निष्कासन
                                                            गरिनेछ । </p>
                                                           <p> ६. परीक्षामा किताब, कापी, चिट, मोवाईल आदि हेर्ने, सार्ने, नक्कल गर्ने र अन्य परीक्षार्थीसँग
                                                            सरसल्लाह समेतका अनुचित काम गरेमा केन्द्राध्यक्षले तुरुन्त परीक्षाबाट निष्काशन गरिने छ र
                                                            निजको सम्पूर्ण परीक्षा रद्ध गरिनेछ । </p>
                                                           <p> ७. नेपाल कानून व्यवसायी परिषद्को सूचनामा उल्लिखित कार्यक्रमअनुसार परीक्षा सञ्चालन हुनेछ । </p>
                                                            <p>८. कुनै अप्रत्यासित कारण परेमा बाहेक परीक्षा तोकिएको मिति र समयमा हुनेछ । </p>
                                                            <p> ९. परीक्षार्थीले परिषद्ले निर्धारित गरेको पाठ्यक्रम तथा परीक्षा संचालन नियमावली र परीक्षा 
                                                            सञ्चालन निर्देशिकामा उल्लिखित नियमहरुको पालन गर्नुपर्नेछ । </p>
                                                            <p> १०. परीक्षार्थीले पालना गर्नुपर्ने नियमहरु पालना नगरेमा त्यस्तो परीक्षार्थीको पुरै परीक्षा परिषद्ले रद्ध
                                                            गर्न वा रोक लगाउन सक्नेछ । </p>
                                                                <!-- <div class="row" style=" font-size: 20px; margin-left: 20px;"> -->
                                                                {{-- <p>(क)   अनलाइन फारम भर्दा राखेको फोटोको सक्कलै फोटो टासी तोकेको स्थानमा दस्तखत (दुवै फोटोमा पर्ने गरी समेत) र प्रस्ट रेखा देखिने औँठा छाँप लगाई प्रवेश पत्र तयार गर्नु पर्दछ । फोटो नटासेको औँठा छाप नलगाएको र तोकेको स्थानमा दस्तखत नगरेको प्रवेशपत्र मान्य हुनेछैन । परीक्षा दिन नपाएका वा परीक्षा छुटेका परीक्षार्थीको परीक्षा शुल्क फिर्ता हुने छैन । </p>
                                                                <p>(ख)   प्रवेश पत्र रुजु र सुरक्षा जाँच भएपछि परीक्षार्थीले आफुलाई परीक्षा दिन तोकेको स्थानमा गई बस्नु पर्नेछ ।   </p>
                                                                <p>(ग)   परीक्षा शुरु हुनु भन्दा २ घण्टा पहिले परीक्षार्थीले परीक्षा केन्द्रमा उपस्थित भै सक्नु पर्ने छ । </p>
                                                                <p>( घ ) परीक्षा शुरु भएको १५ मिनेट भन्दा पछि आउने लाई परीक्षा मा सामेल गराइने  छैन । </p>
                                                                <p>(ङ)   परीक्षा सुरु भएको एक घण्टा अगाडि परीक्षा हल र १ घण्टा ३० मिनेट अगाडि परीक्षा केन्द्र परिसर छाड्न पाईने छैन ।</p>
                                                                <p>(च)   परीक्षार्थीले अनिवार्य रुपमा सक्कल नागरीकता, राष्ट्रिय परिचय पत्र वा सवारी चालक प्रमाण पत्र परीक्षा केन्द्रमा ल्याउनु पर्नेछ ।   </p>
                                                                <p>(छ)	परीक्षा केन्द्रभित्र हुल हुज्जत वा होहल्ला गर्न पाइने छैन । </p>
                                                                <p>(ज)	परीक्षा सञ्चालन गर्ने जिम्मेवारी लिएका केन्द्राध्यक्ष, पर्यवेक्षक, निरिक्षक र कर्मचारी समेतलाई धाक धम्की वा कुटपिट वा अभद्र व्यवहार गर्न पाइने छैन । </p>
                                                                <p>(झ)	परीक्षा केन्द्रमा हातहतियार वा विस्फोटक पदार्थ ल्याउन पाइने छैन । </p>
                                                                <p>(ञ)	परीक्षा कोठामा किताब, कपी, नोटस, चिट तथा मोवाईल जस्ता विद्युतिय उपकरणहरु, ब्लुटुथ, चस्मा, क्यालकुलेटर, पेन ड्राइभ ल्याउन पाइने छैन । यदि ल्याएको खण्डमा हराएमा वा टुटफुट भएमा परिषद् जिम्मेवारी हुने छैन् । </p>
                                                                <p>(ट)	परीक्षामा यताउति हेर्न, ईसारा गर्न, सार्न, नक्कल गर्न र अन्य परीक्षार्थीसँग सरसल्लाह समेतका अनुचित काम गर्न पाइने छैन । </p>
                                                                <p>(ठ)	परीक्षा केन्द्रको सम्पत्तिलाई हानी नोक्सानी पुर्याउन पाइने छैन ।  </p> 
                                                                <p>(ड)  माथि उल्लेखित निर्देशन विपरित कार्यगर्ने परीक्षार्थीलाई तोकिए बमोजिमको कानुनी कारबाहि गरिनेछ ।   </p>
                                                                <p style="font-weight : bold !important;">(ढ)  परीक्षा को समय १ घण्टा ३० मिनेट, पुर्णाङ्क १०० र उत्तीर्ण ५० हुनेछ । </p> --}}
                                                            </div>
                                                            {{-- <center style="font-size: 16px;"><h4>परीक्षा केन्द्र : पुल्चोक इन्जीनियरीङ क्याम्पस, पुल्चोक, ललितपुर </h4></center>
                                                            <center style="font-size: 16px;"><h4>परीक्षाको मिति र समयको लागि परिषद्को वेवसाईटमा हेर्नुहुन जानकारी गराईन्छ ।</h4></center> --}}
                                                        </div>

                                                    </div>

                                                    <div style="height: 100px">
                                                    </div>
                                            
                                                </div>
                                            </div>
                                        </div>
                   
                       @endif

                       @foreach($applicant->documents as $document)
                            @if($document->document_name != "profile")
                             @if( $document->document_name != "signature")
                             @if( $document->document_name != "left_fingure")

                              <div class="break-before" style="margin-left: 20px; margin-right:20px; margin-top:10px; height:842px; width:595px; ">
                                 <img src ="{{ getImage($document->path) }}" style="height: 100%; width:100%;"/>  
                              </div>
                              @endif
                            @endif
                            @endif
                       @endforeach
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


@push('scripts')
    <script>
        function printDiv() {
            var divContents = document.getElementById("printContent");
            var a = window.open('', 'PRINT ADMIT CARD', 'height=800, width=800');

            a.document.write(divContents.outerHTML);
            

        }
    </script>
    @endpush

