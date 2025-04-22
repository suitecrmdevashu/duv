@extends('frontend.layout.master', ['page_title' => 'WHY-DUV'])
@push('styles')
<style>
    .why-duv-section {
        background: #f0f8ff; /* Light blue background */
        padding: 80px 0 60px; /* Added top padding */
    }
    
    .why-duv-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
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
        background: #8ea139;
    }
    
    .mission-card {
        background: #ffffff;
        border-radius: 8px;
        padding: 30px;
        height: 100%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
        border: 1px solid #e0e0e0;
    }
    
    .mission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    
    .mission-card h6 {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 1.1rem;
    }
    
    .mission-card ul {
        padding-left: 20px;
        color: #555;
    }
    
    .mission-card ul li {
        margin-bottom: 10px;
        line-height: 1.6;
        position: relative;
    }
    
    .mission-card ul li:before {
        content: '•';
        color: #8ea139;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .mission-card {
            margin-bottom: 30px;
        }
    }
    
    @media (max-width: 768px) {
        .why-duv-section {
            padding: 60px 0 40px; /* Adjusted top padding for tablet */
        }
        
        .mission-card {
            padding: 25px;
        }
    }
    
    @media (max-width: 576px) {
        .why-duv-section {
            padding: 50px 0 30px; /* More top padding for mobile */
        }
        
        .why-duv-section h2 {
            font-size: 1.8rem;
            margin-bottom: 25px;
        }
        
        .mission-card {
            padding: 20px;
        }
        
        .mission-card ul li {
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
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
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
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
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