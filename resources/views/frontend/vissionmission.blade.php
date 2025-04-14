@extends('frontend.layout.master', ['page_title' => 'vision & mission'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/about.css') }}"/>
@endpush
@section('content')
<div class="bg-light">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Our Mission &amp; Vision</h2>
       
        <div class="row principal-section" style="text-align:justify">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="tb1 paddingm" style=" width: 100%;min-height: 600px;">
                    <h2 class="pt-4" style="color:#fff;">Our Mission</h2>

                    <p style="color:#fff;">Vishal International believes that each child is unique and achiever. Thus, the
                        school respects the individual needs of children, fosters and promotes leadership by
                        creating active ,selective and creative environment by use of innovative techniques to
                        enhance lifelong learning.<br> <br>
                        It moulds and shapes, sharing and caring attitude and establish values that will allow them
                        to act with thoughtfulness and humanity thereby leading them to be Socially, Emotionally,
                        Physically, Intellectually and Virtually future ready. <br> Our aim is to bring forth responsible
                        citizens of the world who make
                        a difference and who will make the school and nation proud of their achievements and Stellar
                        personal qualities.Our Mission is to maintain an active partnership involving the combined efforts of Staff, Parents, Students and Community as a whole. <br>
                        <ul style="color:#fff;">
                            <li>
                                To provide students with a foundation in basic skills.
                            </li>
                            <li>To provide introduction to arts</li>
                            <li>To foster a positive work ethics.</li>
                            <li>To create an environment that harbors tolerance and respect for each other.</li>
                            <li>To spark an attitude of inquiry and enthusiasm for learning that will enable our students to become productive and responsible citizens.</li>
                        </ul>
                        </p> 
                    <p class="missionvision"></p>
                </div>

            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  missionm">

                <div class="tb2 paddingm" style=" width: 100%;min-height: 600px;">
                    <h2 class="pt-4" style="color:#fff;">Our Vision</h2>
                    <p>At Vishal International, we understand the requirement of present generation and redirect ourselves to
                        equip children with positive attitude, core values in addition to World Class Education.
                        </p>
                    Our duty is to encourage all in struggle to live up their highest ideal and strive at the same.
                    Our vision is to prepare our children for life by: 
                    <p></p>


                    <p>Broadening their horizons so that their world encompasses the whole of mankind. <br> <br></p>
                    Deepening their thoughts so that their learning becomes the means to achieve that perfection of
                    mind in which analytical reasoning goes hand in hand with logical conclusion. <br> <br>
                    Helping them incorporate the essential values of goodness, honesty, humility and discipline as
                    an integral part of their being.<br> <br>
                    Guiding them to become contented individuals whose strength lies in their ability to face
                    adversities without fear and overcome challenges with confidence.
                    Inculcating in them the sense of gender sensitivity so that they learn to treat everyone as
                    equal and rise above the barriers of discrimination of any kind.<br> <br>
                    <p></p>
                </div>

            </div>


        </div>
    </div>
@endsection