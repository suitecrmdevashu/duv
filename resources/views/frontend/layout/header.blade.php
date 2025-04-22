<style>
    /* Top Contact Bar - No changes */
    .top-contact-bar {
        background: #343a40;
        padding: 12px 0;
        font-size: 0.9rem;
    }
    
    .contact-info {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }
    
    .contact-links, .social-links {
        display: flex;
        align-items: center;
    }
    
    .contact-links a, .social-links a {
        color: #fff;
        text-decoration: none;
        transition: opacity 0.3s;
        display: flex;
        align-items: center;
    }
    
    .contact-links a:hover, .social-links a:hover {
        opacity: 0.8;
    }
    
    .contact-links li, .social-links li {
        margin-right: 1.5rem;
    }
    
    .contact-links i, .social-links i {
        margin-right: 0.5rem;
    }
    
    .social-links i.fa-youtube-play {
        color: #ff0000;
    }
    
    /* Enhanced Main Header with Expanded Banner */
    .main-header {
        padding: 40px 0; /* Increased padding for more space */
        background: #fff;
        position: relative;
        overflow: hidden;
        margin: 0 -15px; /* Negative margin to expand beyond container */
        width: calc(100% + 30px); /* Compensate for negative margin */
    }
    
    .banner-wrapper {
        max-width: 1400px; /* Wider maximum width */
        margin: 0 auto;
        padding: 0 15px;
    }
    
    .logo-container {
        display: flex;
        justify-content: center;
        position: relative;
        z-index: 2;
        padding: 20px 0; /* Added internal padding */
    }
    
    .logo-container img {
        width: 100%;
        max-width: 1200px; /* Larger maximum width */
        height: auto;
        max-height: 200px; /* Increased height */
        object-fit: contain;
        transition: all 0.5s ease;
        filter: drop-shadow(0 4px 12px rgba(0,0,0,0.2));
        border-radius: 8px; /* Soft rounded corners */
        border: 1px solid rgba(0,0,0,0.05); /* Subtle border */
    }
    
    /* Background glow effect */
    .logo-container::after {
        content: '';
        position: absolute;
        top: -20%;
        left: -20%;
        right: -20%;
        bottom: -20%;
        background: radial-gradient(circle, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0) 70%);
        z-index: -1;
        animation: gentlePulse 8s ease infinite;
        opacity: 0.6;
    }
    
    @keyframes gentlePulse {
        0%, 100% { transform: scale(1); opacity: 0.6; }
        50% { transform: scale(1.05); opacity: 0.4; }
    }
    
    /* Marquee - No changes */
    .marquee-container {
        background: #f8f9fa;
        padding: 8px 0;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }
    
    .custom-marquee {
        color: #fb0344;
        font-weight: 700;
        padding: 5px 0;
        white-space: nowrap;
        overflow: hidden;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .contact-info {
            justify-content: center;
        }
        
        .contact-links, .social-links {
            margin-bottom: 0.5rem;
        }
        
        .main-header {
            padding: 30px 0;
        }
        
        .logo-container img {
            max-height: 180px;
        }
    }
    
    @media (min-width: 1600px) {
        .logo-container img {
            max-height: 250px;
        }
    }
    
    @media (max-width: 768px) {
        .top-contact-bar {
            padding: 8px 0;
            font-size: 0.8rem;
        }
        
        .contact-links li, .social-links li {
            margin-right: 1rem;
        }
        
        .main-header {
            margin: 0 -10px;
            width: calc(100% + 20px);
            padding: 25px 0;
        }
        
        .logo-container img {
            max-height: 150px;
            border-radius: 6px;
        }
        
        .logo-container::after {
            animation: none;
            opacity: 0.3;
        }
    }
    
    @media (max-width: 576px) {
        .contact-links {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .contact-links li, .social-links li {
            margin-right: 0.8rem;
            margin-bottom: 0.3rem;
        }
        
        .social-links {
            justify-content: center;
            width: 100%;
        }
        
        .main-header {
            padding: 20px 0;
            margin: 0 -5px;
            width: calc(100% + 10px);
        }
        
        .logo-container img {
            max-height: 120px;
            border-radius: 4px;
        }
    }
</style>

<!-- Top Contact Bar - No changes -->
<div class="top-contact-bar">
    <div class="container">
        <div class="contact-info">
            @php
                use App\Models\SocialContact;
                $SocialContacts = SocialContact::all();
            @endphp
            
            <ul class="contact-links list-unstyled d-flex mb-0">
                @foreach ($SocialContacts as $SocialInfor)
                    <li>
                        <a href="tel:{{ $SocialInfor->phone }}" class="text-white">
                            <i class="fa fa-phone me-1"></i> {{ $SocialInfor->phone }}
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $SocialInfor->email }}" class="text-white">
                            <i class="fa fa-envelope me-1"></i> {{ $SocialInfor->email }}
                        </a>
                    </li>
                @endforeach
            </ul>
            
            <ul class="social-links list-unstyled d-flex mb-0">
                @foreach ($SocialContacts as $SocialInfor)
                    <li>
                        <a href="{{ $SocialInfor->facebook }}" target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $SocialInfor->youtube }}" target="_blank" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Enhanced Main Header with Expanded Banner -->
<header class="main-header">
    <div class="banner-wrapper">
        <div class="logo-container">
            <a href="{{ route('home') }}">
                <img src="{{ asset('frontend/images/nav_bar_new.jpeg') }}" 
                     alt="Vishal International School" 
                     class="img-fluid">
            </a>
        </div>
    </div>
</header>

<!-- Marquee Announcement - No changes -->
<div class="marquee-container">
    <div class="container">
        @php
            use App\Models\Marque;
            $marquees = Marque::where('status','1')->get();
        @endphp
        <div class="custom-marquee">
            @foreach ($marquees as $marquee)
                <span>{{ $marquee->name }}</span>
                <span aria-hidden="true"> • </span>
            @endforeach
        </div>
    </div>
</div>
<!--Nav-->

<nav class="navbar navbar-expand-lg topnav">
    <button class="navbar-toggler nav-toggle" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <div class="toggle-icons">
            <span class="span1"></span>
            <span class="span2"></span>
            <span class="span3"></span>
        </div>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <form class="form-inline my-2 my-lg-0">
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
        </form>
    </div>
</nav>

<script>
    const toggleBtn = document.querySelector('.nav-toggle');

    toggleBtn.addEventListener('click', function() {
        this.classList.toggle('active');
    });
   // Modern marquee implementation with JavaScript
   document.addEventListener('DOMContentLoaded', function() {
            const marquee = document.querySelector('.custom-marquee');
            if (marquee) {
                // Clone content for seamless looping
                marquee.innerHTML += marquee.innerHTML;
                
                // Animation duration based on content length
                const duration = marquee.textContent.length * 0.05;
                marquee.style.animation = `scroll ${duration}s linear infinite`;
                
                // Add CSS animation
                const style = document.createElement('style');
                style.textContent = `
                    @keyframes scroll {
                        0% { transform: translateX(0); }
                        100% { transform: translateX(-50%); }
                    }
                    .custom-marquee {
                        display: inline-block;
                        animation: scroll ${duration}s linear infinite;
                    }
                `;
                document.head.appendChild(style);
            }
        });
</script>
