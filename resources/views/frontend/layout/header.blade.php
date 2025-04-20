<div class="header-content" style="background: #343a40; padding: 10px 0;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="links">
                @php
                    use App\Models\SocialContact;
                    $SocialContacts = SocialContact::all();
                @endphp
                <ul class="list-unstyled d-flex mb-0">
                    @foreach ($SocialContacts as $SocialInfor)
                        <li class="me-3">
                            <a href="tel:{{ $SocialInfor->phone }}" class="text-white" style="font-weight: 500; text-decoration: none;">
                                <i class="fa fa-phone me-1"></i> {{ $SocialInfor->phone }}
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ $SocialInfor->email }}" class="text-white" style="font-weight: 500; text-decoration: none;">
                                <i class="fa fa-envelope-open me-1"></i> {{ $SocialInfor->email }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="linkss">
                <ul class="list-unstyled d-flex mb-0">
                    @foreach ($SocialContacts as $SocialInfor)
                        <li class="me-3">
                            <a href="{{ $SocialInfor->facebook }}" target="_blank" class="text-white fs-5">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li class="me-3">
                            <a href="{{ $SocialInfor->youtube }}" target="_blank" class="text-white fs-5">
                                <i class="fa fa-youtube-play text-danger"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!--Nav-->
<header>
    <div class="header-regular mt-2">
        <!--Header-->
        <a class="margin" href="{{ route('home') }}"><img src="{{ asset('frontend/images/nav_bar_new.jpeg') }}" width="100%" height="auto"
                alt="Vishal International School" style="margin-top: -0.1em; "></a>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @section('content')
            @php
                use App\Models\Marque;;
                $marquees = Marque::where('status','1')->get();
                // dd($marquees);
            @endphp
            <marquee><span style="font-weight:900; color:rgb(251 3 68); margin-top: -10em !important;"> @foreach ($marquees as $key => $marquee) {{ $marquee->name }} @endforeach </span></marquee>
        </div>
    </div>
</header>

  <!--Nav-->
  <nav class="navbar navbar-expand-lg topnav">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <div id="navigation-regular" class="">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">About Us</a>
                    <ul>
                        <li><a href="{{ route('aboutschool') }}">School Overview</a></li>
                        <li><a href="{{ route('visionmission') }}">Vision & Mission </a>
                        </li>
                        <li><a href="{{ route('why-vis') }}">Why VIS </a></li>
                        <li><a href="{{ route('chairmandesk') }}">Chairman’s Desk</a></li>
                        <li><a href="{{ route('principaldesk') }}">Principal’s Desk</a></li>
                    </ul>
                </li>
                <li><a href="#">Academics</a>
                    <ul>
                        <li><a href="{{ route('teachingmethodolgy') }}">Teaching Methodology</a></li>
                        <li><a href="{{ route('syllabus') }}">Syllabus</a></li>
                        <li><a href="{{ route('curriculum') }}">Curriculam</a></li>
                    </ul>
                </li>
                <li><a href="#">Co-curricular Activities</a>
                    <ul>
                        <li><a href="{{ route('sport') }}">Sports</a></li>
                        <li><a href="{{ route('house-system') }}">House System</a></li>
                        <li><a href="{{ route('club') }}">SUPW/Club Activites</a></li>
                        <li><a href="{{ route('scoutguide') }}">Scout & Guide</a></li>
                    </ul>
                </li>

                <li><a href="#">Campus</a>
                    <ul>
                        <li><a href="{{ route('infrastructure') }}">Infrastructure</a></li>
                        <li><a href="{{ route('facilities') }}">Facilities</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('mpd') }}">Mandatory Public Disclosure</a></li>


                <li><a href="#">Contact Us</a>
                    <ul>
                        <li><a href="{{ route('contactus') }}">Get in touch</a></li>
                        <li><a href="{{ route('career') }}">Career @ VIS</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('transfercertificate') }}">TC</a>
                </li>


                <li><a href="#">Session Info</a>
                    <ul>
                        <li><a href="{{ route('activites') }}">Activites</a></li>
                        <li><a href="{{ route('holidays') }}">Holidays</a></li>
                       
                    </ul>
                </li>


                <li><a href="{{ route('newsannouncements') }}">Latest News & Announcements</a></li>
            </ul>
        </div>
    </div>
</nav>
