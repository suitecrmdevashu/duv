@extends('frontend.layout.master', ['page_title' => 'Facilities'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    {{-- <div class="container about-section"> --}}
        <h2 class="pt-4 ml-5 font-weight-bold">Facilities</h2>
        <section class="location mt-3 mb-5">
          <div class="container business-expert">
            <div class="row">
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/playground.jpg') }}" 0 alt="Image 2">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Playground</h3>
                    <p class="card-text text-justify">The School Playground is specially designed for sports and games to
                      explore and
                      discover the possibilities.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/KidsPlayArea.jpeg') }}" alt="Image 2">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Kids Play Area</h3>
                    <p class="card-text text-justify">Kids Play Area is surrounded with lush green shrubs, flowers, swings,
                      slides, see-saw and much more.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/Dance Room.jpg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Dance Room</h3>
                    <p class="card-text text-justify">Dance is a joy of movement and the heart of life that is why Dance Room.
                    </p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/Computer Lab.jpeg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Computer Lab</h3>
                    <p class="card-text text-justify">The Computer Lab consists of latest Computers which provide tools and technologies for the students.
                    </p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/Library.jpeg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Library</h3>
                    <p class="card-text text-justify">The school library is equipped with well stocked Books, Catalogues,
                      Magazines and
                      daily Newspapers with different versions.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/transport.jpg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Transport</h3>
                    <p class="card-text text-justify">The school has Fleet of Buses for the students and other activities.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/smartroom.jpg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Smart Classrooms</h3>
                    <p class="card-text text-justify">All Classrooms are having Smart Boards and Multimedia devices.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/sportsroom.jpg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Sports Room</h3>
                    <p class="card-text text-justify">Sports Room is equipped with TT Table, Dart Boards and other Indoor
                      Games for the
                      students.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/physicslab.jpg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Physics Lab</h3>
                    <p class="card-text text-justify">The Physics Lab gives the students experience and expertise in Lab Tools and Techniques.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/biologylab.jpeg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Biology Lab</h3>
                    <p class="card-text text-justify">The Biology Lab is well equipped with all required samples and apparatus for observation.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/sciencelab.jpg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Chemistry Lab</h3>
                    <p class="card-text text-justify">The Chemistry Lab provides students all necessary equipment and chemicals for experiments.</p>
                  </div>
                </div>
              </div>
      
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/music-room.jpeg')}}" alt="Image 3">
                  <div class="card-body">
                    <h3 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Music Room</h3>
                    <p class="card-text text-justify">Music Room is designed to play music, vocal as well as instrumental for
                      uplifting
                      moods of the students.</p>
                  </div>
                </div>
              </div>
              
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/medical room.JPG')}}" alt="Image 3">
                  <div class="card-body">
                    <h5 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Medical Room</h5>
                    <p class="card-text text-justify">School has appointed a doctor and has a two bed First Aid Room /Medical Room where injured /ill students on the premises can be taken for first aid.</p>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mt-3">
                <div class="facilities-card card">
                  <img src="{{ asset('frontend/images/Canteen pic.jpg')}}" alt="Image 3">
                  <div class="card-body">
                    <h5 class="text-center mt-0" style="color: #ac7825; font-weight: 600;">Canteen</h5>
                    <p class="card-text text-justify">School canteen facility aims to provide children of working parents to buy food at competitive prices during the school day. 
                      Meals are bought from approved food outlets.</p>
                  </div>
                </div>
              </div>

            </div>
          </div> 
        </section>
    {{-- </div> --}}
</div>
@endsection