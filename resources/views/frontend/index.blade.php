@extends('frontend.layout.master', ['page_title' => 'Home'])
@push('styles')
    <style>
        :root {
            --background-image-url: url('{{ asset('frontend/images/wel.png') }}');
            --background-image-url1: url('{{ asset('frontend/images/index-about-charity.jpg') }}');
        }
        .modern-stripe-section {
        width: 100%;
        overflow: hidden;
        position: relative;
    }
    
    .stripe-container {
        width: 100%;
        margin: 0 auto;
    }
    
    .stripe-items-list {
        display: flex;
        height: 500px;
    }
    
    .stripe-item {
        position: relative;
        flex: 1;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        transition: all 0.5s ease;
        overflow: hidden;
        display: flex;
        align-items: flex-end;
        padding: 30px;
        box-sizing: border-box;
    }
    
    .stripe-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
        z-index: 1;
        transition: all 0.3s ease;
    }
    
    .stripe-item:hover {
        flex: 1.5;
    }
    
    .stripe-item:hover::before {
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 100%);
    }
    
    .stripe-link {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
    }
    
    .stripe-content-wrapper {
        position: relative;
        z-index: 3;
        color: white;
        transform: translateY(20px);
        transition: all 0.3s ease;
        opacity: 0.9;
        width: 100%;
    }
    
    .stripe-item:hover .stripe-content-wrapper {
        transform: translateY(0);
        opacity: 1;
    }
    
    .stripe-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #fff;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    
    .stripe-divider {
        width: 50px;
        height: 2px;
        background: #fff;
        margin: 15px 0;
        transition: all 0.3s ease;
    }
    
    .stripe-item:hover .stripe-divider {
        width: 70px;
    }
    
    .stripe-content {
        font-size: 16px;
        line-height: 1.6;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .stripe-item:hover .stripe-content {
        max-height: 100px;
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .stripe-items-list {
            height: 400px;
        }
        
        .stripe-title {
            font-size: 20px;
        }
    }
    
    @media (max-width: 768px) {
        .stripe-items-list {
            flex-direction: column;
            height: auto;
        }
        
        .stripe-item {
            height: 200px;
            width: 100% !important;
            flex: auto !important;
        }
        
        .stripe-content {
            max-height: 100px !important;
        }
        
        .stripe-content-wrapper {
            transform: translateY(0) !important;
            opacity: 1 !important;
        }
    }
    
    @media (max-width: 576px) {
        .stripe-item {
            height: 150px;
            padding: 20px;
        }
        
        .stripe-title {
            font-size: 18px;
            margin-bottom: 10px;
        }
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/index.css') }}" /> --}}
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

    <div class="modern-stripe-section mt-3">
        <div class="stripe-container">
            <div class="stripe-items-list">
                <!-- Admission -->
                <div class="stripe-item" style="background-image:url('{{ asset('frontend/images/admission.png') }}')">
                    <a class="stripe-link" href="{{ route('admission') }}"></a>
                    <div class="stripe-content-wrapper">
                        <h3 class="stripe-title">ADMISSIONS</h3>
                        <div class="stripe-divider"></div>
                        <div class="stripe-content">
                            Learn about your child's admission requirements, how to apply, and next steps.
                        </div>
                    </div>
                </div>
    
                <!-- School Tour -->
                <div class="stripe-item" style="background-image:url('{{ asset('frontend/images/video.jpg') }}')">
                    <a class="stripe-link" href="{{ route('schooltour') }}" target="_blank"></a>
                    <div class="stripe-content-wrapper">
                        <h3 class="stripe-title">School Tour Video</h3>
                        <div class="stripe-divider"></div>
                        <div class="stripe-content">
                            Take a virtual tour of our campus facilities and classrooms.
                        </div>
                    </div>
                </div>
    
                <!-- Sports -->
                <div class="stripe-item" style="background-image:url('{{ asset('frontend/images/new-sports.jpg') }}')">
                    <a class="stripe-link" href="{{ route('sport') }}" title="Sports" target="_blank"></a>
                    <div class="stripe-content-wrapper">
                        <h3 class="stripe-title">SPORTS</h3>
                        <div class="stripe-divider"></div>
                        <div class="stripe-content">
                            Explore our sports programs and athletic achievements.
                        </div>
                    </div>
                </div>
    
                <!-- Gallery -->
                <div class="stripe-item" style="background-image:url('{{ asset('frontend/images/gallery.jpg') }}')">
                    <a class="stripe-link" href="{{ route('gallery') }}" target="_blank"></a>
                    <div class="stripe-content-wrapper">
                        <h3 class="stripe-title">Gallery</h3>
                        <div class="stripe-divider"></div>
                        <div class="stripe-content">
                            View photos from school events and daily activities.
                        </div>
                    </div>
                </div>
    
                <!-- Achievers -->
                <div class="stripe-item" style="background-image:url('{{ asset('frontend/images/achievers.jpeg') }}')">
                    <a class="stripe-link" href="{{ route('achievers') }}" target="_blank"></a>
                    <div class="stripe-content-wrapper">
                        <h3 class="stripe-title">Achievers</h3>
                        <div class="stripe-divider"></div>
                        <div class="stripe-content">
                            Celebrating our students' academic and extracurricular accomplishments.
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
