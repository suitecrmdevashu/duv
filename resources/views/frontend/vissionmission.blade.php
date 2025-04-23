@extends('frontend.layout.master', ['page_title' => 'Vision & Mission'])
@push('styles')
<style>
    .mission-vision-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .mission-vision-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .mission-vision-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 40px;
        position: relative;
        padding-bottom: 15px;
        text-align: center;
    }
    
    .mission-vision-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .mission-card {
        border-radius: 8px;
        padding: 30px;
        height: 100%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        background-color: #fff;
        border: 1px solid #e0e0e0;
    }
    
    .mission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .mission-card h2 {
        color: #2c3e50 !important;
        font-weight: 700;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
    }
    
    .mission-card h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: #3498db;
    }
    
    .mission-card p {
        color: #555 !important;
        line-height: 1.8;
        font-size: 1.1rem;
    }
    
    .mission-card.mission {
        background-color: #e7f5ff;
        border-left: 4px solid #3498db;
    }
    
    .mission-card.vision {
        background-color: #fff8e6;
        border-left: 4px solid #f39c12;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .mission-vision-section {
            padding: 60px 0;
        }
        
        .mission-vision-container {
            padding: 30px;
        }
        
        .mission-card {
            margin-bottom: 30px;
            min-height: auto;
        }
    }
    
    @media (max-width: 576px) {
        .mission-vision-section {
            padding: 40px 0;
        }
        
        .mission-vision-title {
            font-size: 1.8rem;
        }
        
        .mission-vision-container {
            padding: 20px;
        }
        
        .mission-card {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="mission-vision-section">
    <div class="container">
        <div class="mission-vision-container">
            <h2 class="mission-vision-title">Our Vision & Mission</h2>
            
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <div class="mission-card mission">
                        <h2>Our Mission</h2>
                        <p>{!! $missionVision->mission !!}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="mission-card vision">
                        <h2>Our Vision</h2>
                        <p>{!! $missionVision->vision !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection