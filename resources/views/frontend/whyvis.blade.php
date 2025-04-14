@extends('frontend.layout.master', ['page_title' => 'why-vis'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/about.css') }}"/>
@endpush
@section('content')
<div class="bg-light">
    <div class="container about-section">
        <h2 class="pt-4 text-center"><b> Why Vishal International School</b></h2>
        <br>
        <div class="row principal-section" style="text-align:justify">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  missionm">
                <div class="tb1 paddingm">
                    <h6 class="pt-4" style="color:#fff; font-weight: 700;">At Vishal International we expect our
                        students to:</h6>


                    <p>
                    <ul>
                        <li>
                            Be honest and act with integrity in all that they do
                        </li>
                        <li>
                            Be compassionate, tolerant and helpful
                        </li>
                        <li>
                            Be morally responsible for own actions and decisions
                        </li>
                        <li>
                            Accept challenges and maximise potential
                        </li>
                        <li>
                            Respect different cultures
                        </li>
                        <li>
                            Take interest and enjoy friendship with people
                        </li>
                        <li>
                            Care for Environment.
                        </li>
                    </ul>
                    </p>
                    <p class="missionvision"></p>
                </div>

            </div>


            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  missionm">

                <div class="tb2 paddingm">
                    <h6 class="pt-4" style="color:#fff; font-weight: 700;">Vishal International prepares its
                        students to be:
                    </h6>
                    <p>
                    <ul>
                        <li>
                            Able to face the changing world
                        </li>
                        <li>
                            High achievers
                        </li>
                        <li>
                            Constructively energetic
                        </li>
                        <li>
                            Creative in action
                        </li>
                        <li>
                            Self-confident and engaging
                        </li>
                        <li>
                            Prepared for responsibility and service
                        </li>
                    </ul>
                    </p><br>
                </div>

            </div>


        </div>
    </div>
</div>
@endsection