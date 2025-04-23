@extends('frontend.layout.master', ['page_title' => 'Infrastructure'])
@push('styles')
    <style>
        .infra-section {
            background: #f8f9fa;
            padding: 80px 0;
        }
        
        .infra-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 40px;
        }
        
        .infra-section h2 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .infra-section h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: #3498db;
        }
        
        .infra-description {
            color: #555;
            line-height: 1.8;
            margin-bottom: 25px;
        }
        
        .infra-highlight {
            background-color: #e7f5ff;
            border-left: 4px solid #3498db;
            padding: 30px;
            margin-bottom: 40px;
            border-radius: 0 4px 4px 0;
        }
        
        .infra-divider {
            border-top: 1px solid #3498db;
            margin: 20px 0;
            opacity: 0.3;
        }
        
        .infra-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .infra-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .infra-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        
        .infra-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .infra-card:hover img {
            transform: scale(1.05);
        }
        
        .feature-box {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .feature-icon {
            color: #3498db;
            font-size: 1.5rem;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .feature-content h4 {
            color: #2c3e50;
            margin-bottom: 5px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .infra-gallery {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .infra-section {
                padding: 60px 0;
            }
            
            .infra-container {
                padding: 30px;
            }
            
            .infra-highlight {
                padding: 25px;
            }
            
            .feature-box {
                flex-direction: column;
            }
            
            .feature-icon {
                margin-bottom: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .infra-section {
                padding: 40px 0;
            }
            
            .infra-section h2 {
                font-size: 1.8rem;
            }
            
            .infra-container {
                padding: 20px;
            }
            
            .infra-gallery {
                grid-template-columns: 1fr;
            }
            
            .infra-card img {
                height: 200px;
            }
        }
    </style>
@endpush

@section('content')
<div class="infra-section">
    <div class="container">
        <div class="infra-container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 order-2">
                    <h2>Our Campus Infrastructure</h2>
                    <div class="infra-highlight">
                        <p class="infra-description">
                            Spread across 5 acres of lush greenery, our magnificent campus is designed to provide an ideal learning environment. 
                            The school features state-of-the-art academic and administrative facilities.
                        </p>
                    </div>
                    <p class="infra-description">
                        The campus combines modern architecture with natural beauty, creating a perfect setting for holistic development. 
                        From spacious classrooms to extensive sports facilities, every aspect is planned to nurture young minds and bodies.
                    </p>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
                    <div class="infra-card">
                        <img src="{{ asset('frontend/images/banner3.jpg')}}" alt="Main school building with modern architecture">
                    </div>
                </div>
            </div>

            <div class="infra-divider"></div>

            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Modern Classrooms</h4>
                            <p>Spacious, well-ventilated rooms with smart learning technology</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Science Labs</h4>
                            <p>Fully equipped laboratories for hands-on learning</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Sports Facilities</h4>
                            <p>Extensive grounds for cricket, football, and other sports</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="infra-gallery">
                <div class="infra-card">
                    <img src="{{ asset('frontend/images/Banner1.jpg')}}" alt="School playground and outdoor facilities">
                </div>
                <div class="infra-card">
                    <img src="{{ asset('frontend/images/banner.jpg')}}" alt="Classroom interior with students">
                </div>
                <div class="infra-card">
                    <img src="{{ asset('frontend/images/infra-2.jpg')}}" alt="Science laboratory equipment">
                </div>
                <div class="infra-card">
                    <img src="{{ asset('frontend/images/coverimg1.jpg')}}" alt="School library with reading area">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection