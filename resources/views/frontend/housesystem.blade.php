@extends('frontend.layout.master', ['page_title' => 'House System'])
@push('styles')
<style>
    .house-system-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .house-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .house-intro {
        margin-bottom: 40px;
    }
    
    .house-system-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .house-system-section h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .house-system-section p {
        color: #555;
        line-height: 1.8;
        font-size: 16px;
    }
    
    .house-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }
    
    .house-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .house-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    
    .house-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .house-card-content {
        padding: 25px;
    }
    
    .house-card h3 {
        color: #2c3e50;
        font-size: 22px;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .house-card p {
        margin-bottom: 0;
    }
    
    .house-card b {
        color: #3498db;
    }
    
    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .house-card {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }
    
    .house-card:nth-child(1) { animation-delay: 0.1s; }
    .house-card:nth-child(2) { animation-delay: 0.2s; }
    .house-card:nth-child(3) { animation-delay: 0.3s; }
    .house-card:nth-child(4) { animation-delay: 0.4s; }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .house-cards {
            gap: 20px;
        }
    }
    
    @media (max-width: 768px) {
        .house-system-section {
            padding: 60px 0;
        }
        
        .house-container {
            padding: 30px;
        }
        
        .house-card-content {
            padding: 20px;
        }
    }
    
    @media (max-width: 576px) {
        .house-system-section {
            padding: 40px 0;
        }
        
        .house-system-section h2 {
            font-size: 1.8rem;
        }
        
        .house-cards {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="house-system-section">
    <div class="container">
        <div class="house-container">
            <div class="house-intro">
                <h2>School Houses</h2>
                <p>We have four houses - ARAVALI, NILGIRI, SHIVALIK and VINDHYA. The House System ensures that students from different Grades and Sections come together with a common goal of success. This helps the students interact with people beyond the classrooms and age groups. It also helps them to learn about dealing with people of varying age groups and learning levels. It encourages a spirit of camaraderie, cohesion and competitiveness.</p>
            </div>
            
            <div class="house-cards">
                <!-- ARAVALI House -->
                <div class="house-card">
                    <img src="{{ asset('frontend/images/ARAVALI.jpg')}}" alt="Aravali House">
                    <div class="house-card-content">
                        <h3>ARAVALI</h3>
                        <p>The <b>Aravalli Range</b> is a mountain range in Northern-Western India, running approximately 670 km in a South-West direction, starting near Delhi, passing through Southern Haryana, Rajasthan, and ending in Ahmedabad, Gujarat. The highest peak is Guru Shikhar on Mount Abu at 1,722 metres.</p>
                    </div>
                </div>
                
                <!-- NILGIRI House -->
                <div class="house-card">
                    <img src="{{ asset('frontend/images/NILGIRI.jpg')}}" alt="Nilgiri House">
                    <div class="house-card-content">
                        <h3>NILGIRI</h3>
                        <p>The <b>Nilgiri Mountains</b> form part of the Western Ghats in North-Western Tamil Nadu, Southern Karnataka, and eastern Kerala in India. It is located at the tri-junction of three states and connects the Western Ghats with the Eastern Ghats.</p>
                    </div>
                </div>
                
                <!-- SHIVALIK House -->
                <div class="house-card">
                    <img src="{{ asset('frontend/images/shivalik.jpg')}}" alt="Shivalik House">
                    <div class="house-card-content">
                        <h3>SHIVALIK</h3>
                        <p>The <b>Shivalik Hills</b> are a mountain range of the outer Himalayas that stretches from the Indus River about 2,400 km Eastwards close to the Brahmaputra River, spanning across the northern parts of the Indian subcontinent. It is 10–50 km wide with an average elevation of 1,500–2,000 m.</p>
                    </div>
                </div>
                
                <!-- VINDHYA House -->
                <div class="house-card">
                    <img src="{{ asset('frontend/images/Vindhya.jpg')}}" alt="Vindhya House">
                    <div class="house-card-content">
                        <h3>VINDHYA</h3>
                        <p>The <b>Vindhya Range</b> is a complex, discontinuous chain of mountain ranges, hill ranges, highlands and plateau escarpments in West-Central India. Technically, the Vindhyas do not form a single Mountain range in the Geological Sense.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection