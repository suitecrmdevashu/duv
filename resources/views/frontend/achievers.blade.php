{{-- @extends('frontend.layout.master', ['page_title' => 'Achievers'])
@push('styles')
<style>
    :root {
       --background-image-url: url('{{ asset('frontend/images/dot-pattern.png') }}');
    }
 </style>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/principal-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light mb-3"> --}}
    {{-- <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Achievers</h2>
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    2022-2023 10th Class Acheviers
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body achievers">
                    <div class="result-boxes">
                        <p class="font-weight-bold text-left">
                           Congratulations to the students of Class - X for their Excellent Results announced on 12th May, 2023. <br>
                           The School Management, Principal & Staff applauded the Outstanding Performance of the students and blessed them for their future Endeavours. 
                       </p>
                       </div>
                       <div class="row">
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a1.jpg')}}" class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">YASH KUMAR</h5>
                                       <p class="card-text text-center">94% <br>Maths - 99</p>
                                     </div>
                               </div>
                           </div> 
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a2.jpg')}}" class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">RIYA VERMA</h5>
                                       <p class="card-text text-center">92.5% <br>Comp.App - 98</p>
                                     </div>
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a3.jpg')}}" class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">AYSHA</h5>
                                       <p class="card-text text-center">92% <br>Science - 95</p>
                                     </div>
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a4.jpg')}}" class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">RIYANSH DHAR </h5>
                                       <p class="card-text text-center">92% <br>English - 95 </p>
                                     </div>
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a5.jpg')}}" class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">AADHYA SINGH</h5>
                                       <p class="card-text text-center">91.2% <br>S.S.T - 95</p>
                                     </div>
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a6.jpg')}}" class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">SANJU</h5>
                                       <p class="card-text text-center">89% <br>S.S.T - 98</p>
                                     </div>
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a7.jpg')}} class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">MD. SAAD KHAN</h5>
                                       <p class="card-text text-center"> 88% <br>Maths - 95
                                       </p>
                                     </div>
                               </div>
                           </div> 
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a8.jpg')}}" class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">AKSHAY MISHRA</h5>
                                       <p class="card-text text-center">86% <br>Maths -93</p>
                                     </div>
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                               <div class="achievers-card card">
                                   <img src="{{ asset('frontend/images/acheviers/a9.jpg')}}" class="card-img-top" alt="Image 1">
                                   <div class="card-body">
                                       <h5 class="card-title text-center text-primary">NILAKSHI CHAUHAN</h5>
                                       <p class="card-text text-center">86% <br>Maths -95</p>
                                     </div>
                               </div>
                           </div>            
                       </div>
                </div>
              </div>
            </div>

       
        </div>
       
    </div> --}}

    {{-- <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Achievers</h2>
        <div class="accordion" id="accordionExample">
            @foreach ($headings as $heading)
                <div class="card">
                    <div class="card-header" id="heading{{ $heading->id }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $heading->id }}" aria-expanded="true" aria-controls="collapse{{ $heading->id }}">
                                {!! $heading->heading !!}
                            </button>
                        </h2>
                    </div>
    
                    <div id="collapse{{ $heading->id }}" class="collapse" aria-labelledby="heading{{ $heading->id }}" data-parent="#accordionExample">
                        <div class="card-body achievers">
                            <div class="result-boxes">
                                @foreach ($heading->subheadings as $subheading)
                                    <p class="font-weight-bold text-left">
                                        {!! $subheading->subheading !!}
                                    </p>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ($heading->subheadings as $subheading)
                                    @foreach ($subheading->achieverImages as $image)
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert" style="text-align: justify">
                                            <div class="achievers-card card">
                                                <img src="{{ asset( $image->image_path) }}" class="card-img-top" alt="{{ $image->name }}">
                                                <div class="card-body"> --}}
                                                    {{-- <h5 class="card-title text-center text-primary">{{ $subheading->subheading }}</h5>
                                                    <p class="card-text text-center">{{ $image->percentage }}<br>{{ $image->marks }}</p> --}}
                                                    {{-- <h5 class="card-title text-center text-primary">{{$image->student_name  }}</h5>
                                                    <p class="card-text text-center">{{ $image->percentage }}<br>{{$image->subject}} <br>{{$image->other}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
    </div>
@endsection --}}

@extends('frontend.layout.master', ['page_title' => 'Achievers'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Achievers</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align:justify">
            <div class="row news-row">
                @foreach ($headings as $lna)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert" style="text-align:justify">
                    <div class="card news-card">
                        <div class="card-body">
                          <h5 class="card-title news-title text-center">{{$lna->caption}}</h5>
                          @if (Str::endsWith($lna->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img src="{{ asset($lna->file_path) }}" alt="Image" width="100">
                    @elseif (Str::endsWith($lna->file_path, '.pdf'))
                        <a id="download-link" href="{{ asset($lna->file_path) }}" target="_blank">View</a>
                    @endif
                        </div>
                      </div>
                </div> 
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection