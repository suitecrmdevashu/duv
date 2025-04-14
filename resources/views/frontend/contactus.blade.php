@extends('frontend.layout.master', ['page_title' => 'Contact Us'])
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}" />
@endpush

@section('content')
    <div class="">
        <div class="container">
            <h2 class="pt-4 font-weight-bold">Contact Us</h2>
            @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
        
        @endif
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                    <div class="contact-card card bg-danger" style="width: 22rem; height: 15rem; color: white;">
                        <div class="card-body">
                            <h5 class="card-title text-center mt-4 font-weight-bold">LOCATION</h5>
                            <h4 class="card-subtitle mb-2 text-center mt-3">Vishal International School</h4>
                            <p class="card-text text-center">Near- Tigri Gol Chakkar, Noida Extension, G.B.NAGAR, U.P
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert ml-5 " style="text-align:justify">
                    <div class="contact-card card bg-info" style="width: 18rem; height: 15rem; color: white;">
                        <div class="card-body">
                            <h5 class="card-title text-center mt-4 font-weight-bold">SCHOOL HOURS</h5>
                            <h4 class="card-subtitle mb-2 text-center mt-3">8 AM to 3 PM</h4>
                            <p class="card-text text-center">Weekends: Closed</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 alert" style="text-align:justify">
                    <div class="contact-card card bg-warning" style="width: 18rem; height: 15rem; color: white;">
                        <div class="card-body">
                            <h5 class="card-title text-center mt-4 font-weight-bold">PHONE & EMAIL</h5>
                            <h6 class="card-subtitle mb-2 text-center mt-3"> <i class="fa fa-phone" aria-hidden="true"></i>
                                +91 8506928897</h6>
                            <p class="card-text text-center"><i class="fa fa-envelope" aria-hidden="true"></i>
                                vischool2010@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container bg-white contact-form" style="">
        <form action="{{ route('contactusemail') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 alert " style="text-align:justify">
                    <input type="text" class="form-control" name="first" placeholder="First name" required>
                    <span class="text-danger">{{ $errors->first('first') }}</span>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 alert " style="text-align:justify">
                    <input type="text" class="form-control" name="last" placeholder="Last name" required>
                    <span class="text-danger">{{ $errors->first('last') }}</span>
                </div>
            </div>
            <div class="row" style="margin-top: -1rem;">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 alert " style="text-align:justify">
                    <input type="email" class="form-control" name="emailto" placeholder="Email" required>
                    <span class="text-danger">{{ $errors->first('emailto') }}</span>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 alert " style="text-align:justify">
                    <input type="number" class="form-control" name="phone" placeholder="Phone" required>
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                </div>
            </div>
            <div class="row" style="margin-top: -1rem;">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert form-group">
                    {{-- <textarea class="form-control" name="message" id="message" placeholder="Message"></textarea> --}}
                    <textarea name="message" class="form-control" id="message" placeholder="Message" rows="3"></textarea>
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                </div>
            </div>
            <div class=" col-lg-12 col-md-12 col-sm-12">
                <button class="button button1">Send Message</button>
            </div>
        </form>
    </div>
@endsection
