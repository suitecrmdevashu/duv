@extends('frontend.layout.master', ['page_title' => 'Teaching-Methodolgy'])
@push('styles')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}" /> --}}
@endpush

@section('content')
    <div class="bg-light">
        <div class="container about-section">
            <h2 class="pt-4 font-weight-bold">Teaching Methodology</h2>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-danger" style="text-align:justify">
                <!-- <h3 class="text-center text-warning font-weight-bold">IMPORTANCE OF ART AND CRAFT</h3> -->
                <p class="pb-3">It comprises of the principles and methods used by teachers to enable students learning
                    the strategies are determined partly on the subject matter to be taught and partly by the nature of
                    learning e.g. Audio Lingual, Showing & Telling worked examples, Interactive Lecture -Discussion Based,
                    Problem Solving Based, Project Based so on and so forth.<br><br>
                </p>
            </div>
        </div>
    </div>
@endsection
