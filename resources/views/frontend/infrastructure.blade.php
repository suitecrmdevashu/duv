@extends('frontend.layout.master', ['page_title' => 'Infrastructure'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <div class="row principal-section infra-section">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <h2 class="pt-4 font-weight-bold">Infrastructure</h2>
                <p class="text-justify">The School is spread over about 5 Acres of verdant splendor. The magnificent
                    campus covers the school building academic and administrative floors.The school building is
                    specially designed for sports and games infrastructure in most modern and perhaps the best in
                    Greater Noida (West), Tigri. The perfect setting and ideal environment is chosen for the
                    well-being of students.
                </p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card-group mt-5">
                    <div class="card">
                        <img src="{{ asset('frontend/images/banner3.jpg')}}" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card-group mt-4">
                        <div class="card">
                            <img src="{{ asset('frontend/images/Banner1.jpg')}}" style="width: 100%; height: auto;" class="card-img-top"
                                alt="ashu">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card-group mt-4">
                        <div class="card">
                            <img src="{{ asset('frontend/images/banner.jpg')}}" style="width: 100%; height: auto;" class="card-img-top"
                                alt="...">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card-group mt-4">
                        <div class="card">
                            <img src="{{ asset('frontend/images/infra-2.jpg')}}" style="width: 100%; height: auto;" class="card-img-top"
                                alt="...">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card-group mt-4">
                        <div class="card">
                            <img src="{{ asset('frontend/images/coverimg1.jpg')}}" style="width: 100%; height: auto" class="card-img-top"
                                alt="...">
                        </div>
                    </div>
                </div>
            </div>
           
                
            
        </div>
    </div>

</div>
@endsection