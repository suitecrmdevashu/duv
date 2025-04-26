@extends('frontend.layout.master', ['page_title' => 'Sport'])
@push('styles')
<style>
    .sports-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .sports-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .sports-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .sports-section h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #e74c3c;
    }
    
    .sports-intro {
        background-color: #f5f5f5;
        border-left: 4px solid #e74c3c;
        padding: 30px;
        margin-bottom: 40px;
        border-radius: 0 4px 4px 0;
    }
    
    .sports-intro p {
        color: #555;
        line-height: 1.8;
        margin-bottom: 15px;
    }
    
    .sports-intro b {
        color: #e74c3c;
    }
    
    .sports-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }
    
    .sport-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .sport-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    
    .sport-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .sport-card:hover img {
        transform: scale(1.05);
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .sports-gallery {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .sports-section {
            padding: 60px 0;
        }
        
        .sports-container {
            padding: 30px;
        }
        
        .sports-intro {
            padding: 25px;
        }
    }
    
    @media (max-width: 576px) {
        .sports-section {
            padding: 40px 0;
        }
        
        .sports-section h2 {
            font-size: 1.8rem;
        }
        
        .sports-container {
            padding: 20px;
        }
        
        .sports-gallery {
            grid-template-columns: 1fr;
        }
        
        .sport-card img {
            height: 200px;
        }
    }
</style>
@endpush

@section('content')
<div class="sports-section">
    <div class="container">
        <div class="sports-container">
            <h2>Sports</h2>
            
            <div class="sports-intro">
                <p>Sports is an integral part of our curriculum. Students can perform better in Academics by including sports in their daily routine. Sports keep their mind fresh and add discipline in their life. It helps to teach students various skills such as leadership, patience, team efforts etc.</p>
                <p>We, at DUV International School, organize <b>Early Morning Sports Activities</b> for sports like Football, Cricket, Netball, Handball, Badminton, Yoga, Skating, Karate etc. to enhance the skills of students and to keep them physically fit.</p>
            </div>
            
            <div class="sports-gallery">
                <!-- Fixed Images -->
                <!-- Dynamic Images from Database -->
                @foreach ($sports as $sport)
                <div class="sport-card">
                    <img src="{{ asset($sport->image_path) }}" alt="Sports activity at DUV International School">
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection