  <!-- Footer -->
  <div class="container-fluid footer">
   <img src="{{ asset('frontend/images/Ellipse 2.png')}}" class="circle-footerimg">
    <footer>
     
      <div class="row ifram">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12" style="width: 40%;">
          <!-- <img src="logo/logo.png"> -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.268092930316!2d77.40838617549927!3d28.591733075687056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cef7530000001%3A0x47e1196d9849c511!2sDUV%20International%20School!5e0!3m2!1sen!2sin!4v1743427839084!5m2!1sen!2sin"  class="ovalFoterMap" frameborder="0"
          style="border: 0; width: 120%; height: 80%; margin-top: 30px; margin-left: 10px;"
          allowfullscreen=""></iframe>
          
        </div>

        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mt-5">
          <div class="footer_box">
            <div class="footer_links">
              <!-- <h4>Quick Links</h4> -->
              <ul>
                <li>
                  <a href="{{ route('admission') }}">Admission Procedure</a><br>
                </li>
                <li>
                  <a href="{{ route('home') }}">Home</a><br>
                </li>
                <li>
                  <a href="{{ route('holidays') }}">Session Info</a><br>
                </li>
                <li>
                  <a href="{{ route('newsannouncements') }}">Latest News & Announcements</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
          <!-- <a href="" class="center-link"></a><br> -->
            @php
                use App\Models\SocialContact;;
                $SocialContacts = SocialContact::all();
                //dd($SocialContacts);
            @endphp
          <span class="center-link d"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Parthala Khanjarpur, Sector 123,Noida, Uttar Pradesh 201307</span><br>

          @foreach ($SocialContacts as $SocialInfor)
          <span class="d"><a href="{{$SocialInfor->phone}}"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;{{$SocialInfor->phone}}</a></span><br>
          <span class="d"> <a href="mailto:{{$SocialInfor->email}}"><i class="fa fa-envelope"
                aria-hidden="true"></i>&nbsp; {{$SocialInfor->email}}</a></span><br>
          <span class="text-center mt-5">
            <a href="{{$SocialInfor->facebook}}" class="text-white me-4">
              <i class="fa fa-facebook-f"></i>
            </a> &nbsp;
            <a href="{{$SocialInfor->youtube}}" class="text-white me-4">
              <i class="fa fa-youtube-play red"></i>
            </a> &nbsp;
            <a href="mailto:{{$SocialInfor->email}}" class="text-white me-4">
              <i class="fa fa-google"></i>
            </a> &nbsp;
            @endforeach
            {{-- <a href="" class="text-white me-4">
              <i class="fa fa-instagram"></i>
            </a> &nbsp;
            <a href="" class="text-white me-4">
              <i class="fa fa-linkedin"></i>
            </a> --}}
          </span>
        </div>



        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
          <button type="button" class="btn footer-btn"><a href="{{ route('contactus') }}">Contact Us</a></button>
        </div>
      </div>
      <!--<div class="container-fluid copyright">-->
      <!--  <div class="row">-->
      <!--    <div class="col-md-12 text-center">-->
      <!--      <p>&copy; 2023 Vishal International School. All rights reserved.</p>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
    </footer>
    
    
  </div>
 


  <!-- Bottom Footer -->
  <div class="container-fluid copyright">
    <img src="{{ asset('frontend/images/Ellipse 2.png')}}">
    
  </div>
  <!-- Bottom Footer -->

  