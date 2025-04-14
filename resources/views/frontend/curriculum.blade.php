@extends('frontend.layout.master', ['page_title' => 'Curriculum'])
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}" />
@endpush

@section('content')
    <div class="bg-light">
        <div class="container about-section">
            <h2 class="pt-4 font-weight-bold">Curriculum</h2>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-warning" style="text-align:justify">
                <!-- <h3 class="text-center text-warning font-weight-bold">IMPORTANCE OF ART AND CRAFT</h3> -->
                <p class="">The school is affiliated to Central Board of Secondary Education and prepares the students
                    for AISSE (All India Secondary School Examination) and AISSCE (All India Senior School Certificate
                    Examination), following 10+2 pattern of Education.
                </p>
                <p>
                    Streams Available - Science, Commerce, Humanities/Arts. The medium of instruction is English.
                </p>
                <p>
                    The school has, had an excellent record in results. In addition to Academics, the school seeks to
                    ingrain the Civic and Moral Values in Education.
                </p>
            </div>
        </div>
    </div>
@endsection
