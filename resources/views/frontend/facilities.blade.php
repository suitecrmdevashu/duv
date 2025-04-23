@extends('frontend.layout.master', ['page_title' => 'Facilities'])
@push('styles')
    <style>
        /* Matching Infrastructure Page Styles */
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
            text-align: center;
        }
        
        .infra-section h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #3498db;
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
        
        .facility-body {
            padding: 20px;
        }
        
        .facility-title {
            color: #ac7825;
            font-weight: 600;
            margin-bottom: 10px;
            text-align: center;
            font-size: 1.25rem;
        }
        
        .facility-text {
            color: #555;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        /* Responsive adjustments - matching infrastructure */
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
            <h2>Our Facilities</h2>
            
            <div class="infra-gallery">
                <!-- Kids Play Area -->
                @foreach ($facilities as $facilitiy)
                <div class="infra-card">
                    <img src="{{ asset($facilitiy->photo) }}" alt=" {{ $facilitiy->name }}">
                    <div class="facility-body">
                        <h3 class="facility-title"> {{ $facilitiy->name }}</h3>
                        <p class="facility-text">{{ $facilitiy->content }}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>  
@endsection