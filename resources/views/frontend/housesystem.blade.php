@extends('frontend.layout.master', ['page_title' => 'House System'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <h2 class="pt-4 font-weight-bold">SCHOOL HOUSES </h2>
                <p class="text-justify">We have four houses ARAVALI, NILGIRI, SHIVALIK and VINDHYA.The House System ensures that students from different Grades and Sections come together with a common goal of success. This helps the students interact with people beyond the classrooms and age groups. It also helps them to learn about dealing with people of varying age groups and learning levels. It encourages a spirit of camaraderie, cohesion and competitiveness.<br> <br></p>


            </div>
            <br> <br>
        </div>
        <div class="container mt-5 need-help mb-5">
              <div class="row">
                   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" data-aos-duration="1700" data-aos="zoom-in">
                        <div class="card border-1 rounded-0">
                             <img src="{{ asset('frontend/images/ARAVALI.jpg')}}">
                             <h2>ARAVALI</h2>
                             <p class="text-justify">The <b>Aravalli Range</b> is a mountain range in Northern-Western India, running approximately 670 km in a South-West direction, starting near Delhi, passing through Southern Haryana, Rajasthan, and ending in Ahmedabad, Gujarat. The highest peak is Guru Shikhar on Mount Abu at 1,722 metres.</p>
                        </div>
                   </div>
        
                   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" data-aos-duration="1700" data-aos="zoom-in">
                       <div class="card border-0 rounded-0">
                        <img src="{{ asset('frontend/images/NILGIRI.jpg')}}">
                        <h2>NILGIRI</h2>
                        <p class="text-justify"> <b>Nilgiri Mountains</b> form part of the Western Ghats in North-Western Tamil Nadu, Southern Karnataka, and eastern Kerala in India. It is located at the tri-junction of three states and connects the Western Ghats with the Eastern Ghats.  </p>
                       </div>
                   </div>
        
                   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" data-aos-duration="1700" data-aos="zoom-in">
                       <div class="card border-1 rounded-0">
                        <img src="{{ asset('frontend/images/shivalik.jpg')}}">
                        <h2>SHIVALIK</h2>
                        <p ><b>The Shivalik Hills</b> are a mountain range of the outer Himalayas that stretches from the Indus River about 2,400 km Eastwards close to the Brahmaputra River, spanning across the northern parts of the Indian subcontinent. It is 10–50 km wide with an average elevation of 1,500–2,000 m.    
                          </p>
                       </div>
                   </div>
        
                   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" data-aos-duration="1700" data-aos="zoom-in">
                    <div class="card border-1 rounded-2">
                     <img src="{{ asset('frontend/images/Vindhya.jpg')}}">
                     <h2>VINDHYA</h2>
                     <p class="text-justify"> <b>The Vindhya Range</b>  is a complex, discontinuous chain of mountain ranges, hill ranges, highlands and plateau escarpments in West-Central India. Technically, the Vindhyas do not form a single Mountain range in the Geological Sense.
                       </p>
                    </div>
                </div>
              </div>
        </div> 
    </div>
</div>
@endsection