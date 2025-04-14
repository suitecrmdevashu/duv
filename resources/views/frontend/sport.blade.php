@extends('frontend.layout.master', ['page_title' => 'Sport'])
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}" />
@endpush

@section('content')
    <div class="bg-light">
        <div class="container about-section">
            <h2 class="pt-4 font-weight-bold">Sports</h2>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-secondary" style="text-align:justify">
                <!-- <h3 class="text-center text-warning font-weight-bold">IMPORTANCE OF ART AND CRAFT</h3> -->
                <p class="pb-3">Sports is an integral part of our curriculum. Students can perform better in Academics by
                    including sports in their daily routine. Sports keep their mind fresh and add discipline in their life.
                    It helps to teach students various skills such as leadership, patience, team efforts etc.<br><br>
                    We, at Vishal International School, organize <b>Early Morning Sports Activities</b> for sports like Football,
                    Cricket, Netball, Handball, Badminton, Yoga, Skating, Karate etc. to enhance the skills of students and
                    to keep them physically fit.
                </p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/s1.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/s3.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/s4.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/ft1.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/ft2.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/ft3.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/ft4.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/ft5.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/ft6.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/netball-1.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/netball-2.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/netball-3.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/netball-4.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/netball-5.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/netball-6.jpg') }}" class="card-img-top"
                            alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/v1.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/karate 2.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/Karate 1.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/Skating.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset('frontend/images/sport/yoga.jpg') }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                @foreach ($sports as $sport )    
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset($sport->image_path) }}" class="card-img-top" alt="Image 1">
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection
