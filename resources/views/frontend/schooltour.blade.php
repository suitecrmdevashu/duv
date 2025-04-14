@extends('frontend.layout.master', ['page_title' => 'School Tour'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light mb-5">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">School Tour</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qJr7zwQJ3pw" allowfullscreen></iframe>
            </div>
            <div class="text-center mt-3">
                <a href="https://www.youtube.com/@vishalinternationalschool4181/videos" class="btn btn-danger">More Videos</a>
            </div>
        </div>
    </div>
</div>
@endsection
