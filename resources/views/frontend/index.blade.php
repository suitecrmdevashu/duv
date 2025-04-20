@extends('frontend.layout.master', ['page_title' => 'Home'])
@push('styles')
    <style>
        :root {
            --background-image-url: url('{{ asset('frontend/images/wel.png') }}');
            --background-image-url1: url('{{ asset('frontend/images/index-about-charity.jpg') }}');
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/index.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/js_composer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endpush


@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($bannerImages as $key => $bannerImage)
                <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                    <img class="d-block w-100" src="{{ asset($bannerImage->image_path) }}"
                        alt="{{ $bannerImage->alt_text }}">
                </div>
            @endforeach


        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- About Our charity -->
    <div class="container-fluid about-our-charity">
        <div class="container mt-10 pb-3">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 left-content  mb60 pdt40" data-aos="zoom-in">
                    <h2>WELCOME TO OUR SCHOOL</h2>
                    <p class="text-justify">
                        DUV International School, has always believed in education that bears greater affinity to a students
                        life ahead. The founder principal Mrs. P.L. Rana’s inspiration and constant guidance has made the
                        school a force to reckon with in various fields. Besides academics, the school has done exceedingly
                        well in various areas like sports, music, performing arts, oratory and a lot more. When a child
                        comes to us it is his/her very first exposure to the world outside the realm of the family. The
                        imprints of the first experience give direction to his life later. So, we aim at the overall
                        development of our students.In the present world of degenerating values, we seek to inculcate good
                        values which have been producing true human beings who lead our society towards true upliftment. The
                        aim can only be attained if all possible avenues are explored and utilised to develop the all round
                        personality of the pupil.</p>

                    <br>
                    <!-- <a href="#" class="btn btn-default">read more...</a> -->

                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 right-content" data-aos="zoom-in">

                    <div class="mt-5 shadow-lg" id='calendar' style="background-color:white; border-radius:10px;"></div>
                    {{-- <iframe
                      src="https://calendar.google.com/calendar/embed?src=en.indian%23holiday%40group.v.calendar.google.com&amp;ctz=Asia%2FKolkata"
                      style="border: 0" width="550" height="500" frameborder="0" scrolling="no"></iframe> --}}

                </div>
            </div>
        </div>
    </div>

    <!-- Our Vission & Mission -->
    <div class="container mt-5 vission-mission">
        <div class="row mb-5" data-aos="flip-left" data-aos-duration="1700">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card border-0">
                    <img src="{{ asset('frontend/images/mission.jpg') }}" class="shadow">
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card border-0">
                    <h2>Our Mission</h2>
                    <p>
                      {!! \Illuminate\Support\Str::words($missionVision->mission ?? '', 50, '...') !!}
                        <br>
                    </p>
                    <button><a href="{{ route('visionmission') }}">Learn More</a></button>
                </div>
            </div>
        </div>

        <div class="row mt-5" data-aos="flip-right" data-aos-duration="1700">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card border-0">
                    <h2>Our Vision</h2>
                    <p>
                      {!! \Illuminate\Support\Str::words($missionVision->vision ?? '', 50, '...') !!}
                    </p>

                    <button><a href="{{ route('visionmission') }}">Learn More</a></button>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <img src="{{ asset('frontend/images/vission.jpg') }}" class="shadow">
                </div>
            </div>
        </div>
    </div>


    <!--modern school-->
    <div class="modern">
        <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true"
            class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="vc_row">
                            <div class="vc_col-sm-12 gt3_stripe_columns  ">
                                <div class="module_content stripe_items_list items1" data-count-child="5">

                                    <div class="stripe_item"
                                        style="height:600px;width:20%;background-image:url('{{ asset('frontend/images/admission.png') }}')">
                                        <a class="gt3_stripe-link" href="{{ route('admission') }}"> </a>
                                        <div class="stripe_item-wrapper">
                                            <h3 class="stripe_item-title btn btn-default" style=" color: #ffffff;">
                                                ADMISSIONS
                                            </h3>
                                            <div class="stripe_item-divider"></div>
                                            <div class="stripe_item-content" style=" color: #ffffff;">
                                                <!-- Learn about your child’s admission
                            requirements, how to apply, and the next steps once you’ve applied. -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="stripe_item"
                                        style="height:600px;width:20%;background-image:url('{{ asset('frontend/images/video.jpg') }}')">
                                        <a class="gt3_stripe-link" href="{{ route('schooltour') }}" target=" _blank"> </a>
                                        <div class="stripe_item-wrapper">
                                            <h3 class="stripe_item-title btn btn-default" style=" color: #ffffff;">School
                                                Tour Video
                                            </h3>
                                            <div class="stripe_item-divider"></div>
                                            <div class="stripe_item-content" style=" color: #ffffff;"><span>
                                                    <!-- The Vishal International School is
                              a co-education public school. The school is affiliated to the CBSE board. -->
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="stripe_item"
                                        style="height:600px;width:20%;background-image:url('{{ asset('frontend/images/new-sports.jpg') }}')">
                                        <a class="gt3_stripe-link" href="{{ route('sport') }}" title="Sports"
                                            target=" _blank"> </a>
                                        <div class="stripe_item-wrapper">
                                            <h3 class="stripe_item-title btn btn-default" style=" color: #ffffff;">SPORTS
                                            </h3>
                                            <div class="stripe_item-divider"></div>
                                            <div class="stripe_item-content" style=" color: #ffffff;">
                                                <!-- Education at SASSS isn’t limited to the
                            classroom. It happens throughout campus each and every day through our student activities. -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="stripe_item"
                                        style="height:600px;width:20%;background-image:url('{{ asset('frontend/images/gallery.jpg') }}')">
                                        <a class="gt3_stripe-link" href="{{ route('gallery') }}" target=" _blank"> </a>
                                        <div class="stripe_item-wrapper">
                                            <h3 class="stripe_item-title btn btn-default" style=" color: #ffffff;">Gallery
                                            </h3>
                                            <div class="stripe_item-divider"></div>
                                            <div class="stripe_item-content" style=" color: #ffffff;"><span>
                                                    <!-- Co-Curricular activities are meant
                              to bring social skills, intellectual skills, moral values, personality progress and character
                              appeal in students. -->
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="stripe_item"
                                        style="height:600px;width:20%;background-image:url('{{ asset('frontend/images/achievers.jpeg') }}')">
                                        <a class="gt3_stripe-link" href="{{ route('achievers') }}" target=" _blank">
                                        </a>
                                        <div class="stripe_item-wrapper">
                                            <h3 class="stripe_item-title btn btn-default" style=" color: #ffffff;">
                                                Achievers
                                            </h3>
                                            <div class="stripe_item-divider"></div>
                                            <div class="stripe_item-content" style=" color: #ffffff;">
                                                <!-- Where you live, plays an important role
                            in child’s development. We ensure the highest form of care is extended to them. -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shape Divider -->
    <div class="custom-shape-divider-bottom-1655182610">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill">
            </path>
        </svg>
    </div>


    <div class="container-fluid business-expert mt-5">
    </div>

    <section class="first-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="content-sec col-12">
                    <h1 class="text-center facilities">Facilities at DUV</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="location mt-5">
      <div class="container-fluid business-expert">
          <div class="row">
              @foreach ($facilities as $facilitiy)
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                      <div class="facilities-card card h-100">
                          <img src="{{ asset($facilitiy->photo) }}" class="card-img-top" alt="Facility Image">
                          <div class="card-body d-flex flex-column">
                              <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">
                                  {{ $facilitiy->name }}
                              </h3>
                              <p class="card-text text-justify">{{ $facilitiy->content }}</p>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </section>
  
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script>
        $(document).ready(function() {

            var SITEURL = "https://vishalinternationalschool.com";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                events: SITEURL + "/calendar",
                displayEventTime: false,
            });

        });
    </script>
@endpush
