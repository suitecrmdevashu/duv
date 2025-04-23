@extends('frontend.layout.master', ['page_title' => 'about-school'])
@push('styles')
    <style>
        /* Impact Section - Professional Styling */
        .impact-section {
            padding: 60px 0;
        }
        
        .impact-section h1 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
        }
        
        .impact-section h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #8ea139;
        }
        
        .impact-content {
            max-width: 800px;
            margin: 30px auto 0;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }
        
        .impact-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 40px;
            margin-bottom: 40px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .impact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .impact-content {
                padding: 0 20px;
            }
        }
        
        @media (max-width: 768px) {
            .impact-section h1 {
                font-size: 2rem;
            }
            
            .impact-content {
                font-size: 1rem;
            }
            
            .impact-card {
                padding: 30px 20px;
            }
        }
        
        @media (max-width: 576px) {
            .impact-section {
                padding: 40px 0;
            }
            
            .impact-section h1 {
                font-size: 1.8rem;
            }
            
            .impact-content {
                padding: 0 15px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="impact-section">
        <div class="container">
            <!-- About School -->
            <div class="impact-card" data-aos="fade-up" data-aos-duration="1000">
                <h1>About School</h1>
                <div class="impact-content" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <p>{!! nl2br(strip_tags($data->about)) !!}</p>
                </div>
            </div>
            
            <!-- Academics -->
            <div class="impact-card" data-aos="fade-up" data-aos-duration="1000">
                <h1>Academics</h1>
                <div class="impact-content" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <p>{!! nl2br(strip_tags($data->academics)) !!}</p>
                </div>
            </div>
            
            <!-- Amenities / Facilities -->
            <div class="impact-card" data-aos="fade-up" data-aos-duration="1000">
                <h1>Amenities / Facilities</h1>
                <div class="impact-content" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <p>{!! nl2br(strip_tags($data->amenities)) !!}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
