@extends('frontend.layout.master', ['page_title' => 'Music & Dance'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Music & Dance</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-primary" style="text-align:justify">
            <!-- <h3 class="text-center text-warning font-weight-bold"> Music & Dance department</h3> -->
            <p class=""><span> <strong>Indian Vocal Music –</strong> In this teachers teach the basics of Classical
                    Ragas, Semi Classical songs, Patriotic songs, folk songs, etc.<br>
                </span>
                <span><u></u></span>
            </p>
            <hr>
            <p class="text-justify"><span> <strong>Indian Instruments –</strong> In this the students learn Casio,
                    Guitar, Mandolin, Flute, etc. Basically students learn different music pieces (Solo and
                    Orchestra).<br>
                </span>
                <span><u></u></span>
            </p>
            <hr>
            <p class="text-justify"><span> <strong>Indian Rhythm –</strong> In this students learn Tabla, Dholak,
                    Congo, and Banjo etc. Different Indian Taals (Tin Tal, Jhap Tal, Dadra, Keherba) etc. are
                    taught.<br>
                </span>
                <span><u></u></span>
            </p>
            <hr>
            <p class="text-justify"><span> <strong>Indian Dance –</strong> As far as Indian Dance is concerned
                    students are taught the basics of Classical (Kathak, Bharatnatyam, Kuchipudi and Odissi) dance
                    styles. Folk dances and Creative compositions are also taught.<br>
                </span>
                <span><u></u></span>
            </p>
            <hr>
            <p class="text-justify"><span> <strong>Western Music –</strong> There are two parts in Western Music.
                    They are Vocal and Instrumental. In vocal, students learn both solo as well as group songs and
                    in Instrumental they learn Casio and Guitar.<br>
                </span>
                <span><u></u></span>
            </p>
            <hr>
            <p class="text-justify"><span> <strong>Western Dance –</strong> In Western Dance a variety of dance
                    forms are taught- Contemporary, Hip-hop, Jazz, etc. Sometimes students also learn dances based
                    on Bollywood songs.<br>
                </span>
                <span><u></u></span>
            </p>
        </div>
    </div>
</div>
@endsection