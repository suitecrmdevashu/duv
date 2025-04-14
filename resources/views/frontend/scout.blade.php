@extends('frontend.layout.master', ['page_title' => 'Scout & Guide'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Scout & Guide</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-primary" style="text-align:justify">
            <!-- <h3 class="text-center text-warning font-weight-bold"> Music & Dance department</h3> -->
            <p class=""><span> The purpose of Bharat Scout & Guide is to contribute to the development of young people in achieving their full physical , intellectual, emotional, social and spiritual potentials, as individual and as responsible citizens of the local, national and international communities.<br>
                </span>
                <span><u></u></span>
            </p>
            <hr>
            <p class="text-justify"><span> <strong>SCOUT – GUIDE :</strong> School organizes Scout & Guide Camp regularly for Classes V to XII.<br>
                </span>
                <span><u></u></span>
            </p>
            <hr>
            <p class="text-justify"><span> <strong>CUB – BULBUL :</strong> School organizes Cub & Bulbul Camp regularly for Classes I to IV.<br>
                </span>
                <span><u></u></span>
            </p>

        </div>
            <div class="row">
                @foreach ( $scouts as $scout )
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="sport-card card">
                        <img src="{{ asset($scout->image_path)}}" class="card-img-top" alt="Image 1">
                    </div>
                </div> 
                @endforeach                
            </div>
            

        </div>
    </div>
@endsection