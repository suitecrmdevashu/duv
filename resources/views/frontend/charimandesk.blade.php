@extends('frontend.layout.master', ['page_title' => 'chairmandesk'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <div class="row principal-section">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <h2 class="pt-4 font-weight-bold">Chairman’s Desk</h2>
                <p class="text-justify">Vishal International School stands at the threshold of changing global patterns and perspectives where every new day dawns with new challenges. Our strong academic thrust is supplemented with providing direction and guidance to young learners to understand the changing social values, norms and societal pressures, so that they may take informed decisions. Our endeavor is to nurture moral and intellectual leaders, individuals with dignity, integrity and compassion who want to make a positive difference in the world.
                </p>
                <p class="text-justify">
                    The school aims at providing an all – round education and trains the students intellectually, morally, spiritually and physically so as to inculcate in them the right principles of conduct and the right attitude in life, thereby enabling them to become loyal and useful citizens of our country.
                </p>

            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="principal-pic">
                    <img src="{{ asset('frontend/images/chairmen.jpg')}}" alt="simple bootstrap template" class="img-fluid">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                {{-- <p>You stepped into the portals of this great institution with fresh thoughts, lofty aims, high
                    hopes, and exalted aspirations. I assure you that your ambitions will be accomplished through
                    the able guidance of the highly accomplished and experienced faculty of teachers. In return, the
                    school seeks superior ethics, positive attitude, social and moral values and discipline.
                    Remember, you are the torchbearers and your first and foremost duty is to follow the footsteps
                    of the trailblazer alumni yet chart a unique course for yourself.Let’s be a positive catalytic
                    impulse for every student so that they stretch their inherent learning competencies through a
                    self-discovery process.</p> --}}
                <p class="pt-3"><b>Mrs. Vimlesh Yadav</b></p>
                <p><b>Chairman</b></p>
            </div>


        </div>
    </div>
   
</div>
@endsection