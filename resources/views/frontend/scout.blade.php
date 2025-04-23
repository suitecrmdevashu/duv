@extends('frontend.layout.master', ['page_title' => 'Scout & Guide'])
@push('styles')
<style>
    .scout-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .scout-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .scout-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .scout-section h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .scout-info {
        background-color: #e7f5ff;
        border-left: 4px solid #3498db;
        padding: 30px;
        margin-bottom: 40px;
        border-radius: 0 4px 4px 0;
    }
    
    .scout-section p {
        color: #555;
        line-height: 1.8;
        margin-bottom: 15px;
    }
    
    .scout-section strong {
        color: #2c3e50;
    }
    
    .scout-divider {
        border-top: 1px solid #3498db;
        margin: 20px 0;
        opacity: 0.3;
    }
    
    .scout-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    
    .scout-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .scout-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    
    .scout-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .scout-card:hover img {
        transform: scale(1.05);
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .scout-gallery {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .scout-section {
            padding: 60px 0;
        }
        
        .scout-container {
            padding: 30px;
        }
        
        .scout-info {
            padding: 25px;
        }
    }
    
    @media (max-width: 576px) {
        .scout-section {
            padding: 40px 0;
        }
        
        .scout-section h2 {
            font-size: 1.8rem;
        }
        
        .scout-container {
            padding: 20px;
        }
        
        .scout-gallery {
            grid-template-columns: 1fr;
        }
        
        .scout-card img {
            height: 200px;
        }
    }
</style>
@endpush

@section('content')
<div class="scout-section">
    <div class="container">
        <div class="scout-container">
            <h2>Scout & Guide</h2>
            
            <div class="scout-info">
                <p>The purpose of Bharat Scout & Guide is to contribute to the development of young people in achieving their full physical, intellectual, emotional, social and spiritual potentials, as individuals and as responsible citizens of the local, national and international communities.</p>
                
                <div class="scout-divider"></div>
                
                <p><strong>SCOUT – GUIDE:</strong> School organizes Scout & Guide Camp regularly for Classes V to XII.</p>
                
                <div class="scout-divider"></div>
                
                <p><strong>CUB – BULBUL:</strong> School organizes Cub & Bulbul Camp regularly for Classes I to IV.</p>
            </div>
            
            <div class="scout-gallery">
                @foreach($scouts as $scout)
                <div class="scout-card">
                    <img src="{{ asset($scout->image_path) }}" alt="Scout & Guide Activity">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection