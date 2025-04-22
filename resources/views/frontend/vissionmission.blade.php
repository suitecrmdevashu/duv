@extends('frontend.layout.master', ['page_title' => 'vision & mission'])
@push('styles')
    <style>
         .mission-card {
        padding: 20px;
        box-sizing: border-box;
    }
    
    @media (max-width: 767px) {
        .principal-section {
            flex-direction: column;
        }
        
        .mission-card {
            min-height: 250px !important; /* Adjust as needed for mobile */
        }
    }
    
    @media (min-width: 768px) {
        .mission-card {
            min-height: 600px;
        }
    }
    
    /* Maintain background colors */
    .tb1 {
        background: /* your original background color or class */;
    }
    
    .tb2 {
        background: /* your original background color or class */;
    }
    
        .principal-section {
            padding-top: 0px;
            padding-bottom: 47px;
        }

        .paddingm {
            padding: 10px 20px;

        }

        .tb1 {
            /*background-image: -webkit-linear-gradient( 0deg , rgb(35,204,136) 0%, rgb(142,207,53) 100%)!important;*/
            background-image: linear-gradient(to bottom, #69c 40%, #316598);
        }

        p {
            margin-bottom: 0px;
            color: white !important;
        }

        ul {
            color: white !important;
        }

        .tb2 {
            /*background-image: -webkit-linear-gradient( 0deg , rgb(255,79,88) 0%, rgb(255,180,0) 100%)!important;*/
            background-image: linear-gradient(to bottom, #ab7967 40%, #724b38);
        }

        p:last-child {
            margin-bottom: 0px;
        }

        h2 {
            font-size: 26px;
            font-weight: normal;
            color: #e2002d;
        }
    </style>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/about.css') }}"/> --}}
@endpush
@section('content')
<div class="bg-light">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Our Mission &amp; Vision</h2>
        <div class="row principal-section" style="text-align:justify">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-4 mb-lg-0">
                <div class="tb1 paddingm mission-card" style="width: 100%; height: 100%; min-height: 300px;">
                    <h2 class="pt-4" style="color:#fff;">Our Mission</h2>
                    <p style="color:#fff !important;">{!! $missionVision->mission !!}</p>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 missionm">
                <div class="tb2 paddingm mission-card" style="width: 100%; height: 100%; min-height: 300px;">
                    <h2 class="pt-4" style="color:#fff !important;">Our Vision</h2>
                    <p>{!! $missionVision->vision !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
