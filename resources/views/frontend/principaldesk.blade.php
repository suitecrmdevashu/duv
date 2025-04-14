@extends('frontend.layout.master', ['page_title' => 'Principal Desk'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/principal-desk.css') }}"/>
@endpush

@section('content')
<div class="container about-section">
    <div class="row principal-section">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <h2 class="pt-4">Principal's Desk</h2>
            {{-- <p class="font-weight-bold text-justify">“Teamwork is the ability to work together towards Common Vision”</p> --}}
            {{-- <p class="text-justify">Sharing my views through this virtual platform is really a matter of pleasure for me. Developing Individual Strength with Loving Guidance is the ability to direct individual accomplishments towards organizational objectives. I endeavor to instill in the students, the sense of responsibility and initiative to become useful members of the society, so that they can play the role in building the Nation (Great India). I believe that the meaningful education driven by our principles, respect, rigor and involvement that will make us more responsible towards dedication to create peaceful environment and acceptance. Human mind is the seat of all knowledge and it should be acquired to distinguish between right or wrong through education.
            </p> --}}
            {{-- <p class="text-justify">
                The aim of education should be to impart knowledge to the students, not only of the facts but of the values also with an immense pride and feeling of great satisfaction. Our vision is to produce conscientious, smart, confident citizens of India by exploring new ways of performing tasks.
            </p> --}}
            @foreach($principals as $principal)
            <p class="text-justify">{!! $principal->message !!}</p>

        </div>

        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="principal-pic">
                <img src="{{asset( $principal->image)}}" alt="simple bootstrap template" class="img-fluid">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            {{-- <p class="text-justify">Our school is striving to unfold the hidden potential of each and every student and enhance their capabilities by providing ample opportunities in the cultural literacy as well as sporty front, keeping pace with technology and Development with the introduction of smart classes, computer aided teaching, students are marching towards unlimited knowledge. We are sure that our computer labs and smart classes will go a long way in feeding the Intellectual requirements of our young minds to assess the latest information both locally and globally.</p>
            <p class="font-weight-bold">“Working for Success will make you a Master; Working for Satisfaction will make you a Legend”</p> --}}
            <p class="pt-3"><b></b>{{ $principal->name }}
                </b></p>
                @endforeach 
            <p><b>Principal</b></p>
        </div>


    </div>
</div>
@endsection