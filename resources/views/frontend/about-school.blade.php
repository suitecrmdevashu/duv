@extends('frontend.layout.master', ['page_title' => 'about-school'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/about.css') }}"/>
@endpush
@section('content')
 <!-- impact -->
 <div class="container mt-5 text-center impact">
    <h1>About School</h1>
    <hr>
    <p class="mt-3" data-aos-duration="1700" data-aos="zoom-in"><b>Vishal International School,</b> was established in
      2006 in Tigri, Greater Noida (West) in the memory of LATE SHRI INDER YADAV (A National Level Wrestler) by Vimlesh
      Yadav. The school has a Vision of new world in which relationships are governed by the spirit of universal
      fraternity. The school functions under the guidance of eminent Educationalists drawn from different fields of
      Education, Science and Technology. The School has won laurels at state, as well as National levels.
    </p>
  </div>

  <div class="container mt-5 text-center impact">
    <h1>Academics</h1>
    <hr>
    <p class="mt-3" data-aos-duration="1700" data-aos="zoom-in">The School is affiliated to Central Board of Secondary
      Education New Delhi and prepares the students for (AISSCS) & (AISSE).
      It prepares students for All India Secondary School Examination and All India Senior School Certificate
      Examination, following 10+2 Pattern of Education.
      Streams available: Science, Commerce, Humanities/Arts.
      The Medium of Instruction is English.
      The School has, had an excellent record in Examination. In addition to Academics the School seeks to ingrain the
      Civic and Moral Values to the Students.
    </p>
  </div>

  <div class="container mt-5 text-center impact">
    <h1>Amenities / Facilities</h1>
    <hr>
    <p class="mt-3" data-aos-duration="1700" data-aos="zoom-in">The School has Specious and Modern Laboratories for
      Physics, Chemistry, Biology & Computer and Smart Classes. Besides Art and Craft Rooms, a separate work experience
      block has been designed to reveal the hidden talent of our students in different activities. An infirmary is
      equipped with Medical and Nursing care for the students in case of any eventuality. Extra curricular activities
      like Dance, Music, Taekwondo, Skating are also the part of curriculum.
    </p>
</div>
@endsection