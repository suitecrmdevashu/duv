@extends('frontend.layout.master', ['page_title' => 'WHY-DUV'])
@push('styles')
@push('styles')
<style>
    .why-duv-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .why-duv-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 50px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .why-duv-section h2:after {
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
        background: #fff;
        border-radius: 8px;
        padding: 30px;
        height: 100%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        margin-bottom: 30px;
        border-top: 4px solid #3498db;
        transition: all 0.3s ease;
    }
    
    .mission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .mission-card h6 {
        color: #3498db;
        font-weight: 600;
        margin-bottom: 20px;
        font-size: 1.1rem;
    }
    
    .mission-card ul {
        padding-left: 20px;
    }
    
    .mission-card li {
        color: #555;
        line-height: 1.8;
        margin-bottom: 10px;
        position: relative;
        list-style-type: none;
        padding-left: 25px;
    }
    
    .mission-card li:before {
        content: '✓';
        color: #2ecc71;
        position: absolute;
        left: 0;
        font-weight: bold;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .why-duv-section {
            padding: 60px 0;
        }
        
        .mission-card {
            padding: 25px;
        }
    }
    
    @media (max-width: 576px) {
        .why-duv-section {
            padding: 40px 0;
        }
        
        .why-duv-section h2 {
            font-size: 1.8rem;
        }
        
        .mission-card {
            padding: 20px;
        }
        
        .mission-card li {
            font-size: 0.95rem;
        }
    }
</style>
@endpush

@section('content')
<div class="why-duv-section">
    <div class="container">
        <h2 class="text-center">Why DUV International School</h2>
        
        <div class="row">
            <!-- First Column -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <div class="mission-card">
                    <h6>At DUV International we expect our students to:</h6>
                    <ul>
                        <li>Be honest and act with integrity in all that they do</li>
                        <li>Be compassionate, tolerant and helpful</li>
                        <li>Be morally responsible for own actions and decisions</li>
                        <li>Accept challenges and maximise potential</li>
                        <li>Respect different cultures</li>
                        <li>Take interest and enjoy friendship with people</li>
                        <li>Care for Environment</li>
                    </ul>
                </div>
            </div>
            
            <!-- Second Column -->
            <div class="col-lg-6 col-md-12">
                <div class="mission-card">
                    <h6>DUV International prepares its students to be:</h6>
                    <ul>
                        <li>Able to face the changing world</li>
                        <li>High achievers</li>
                        <li>Constructively energetic</li>
                        <li>Creative in action</li>
                        <li>Self-confident and engaging</li>
                        <li>Prepared for responsibility and service</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection