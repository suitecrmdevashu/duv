@extends('frontend.layout.master', ['page_title' => 'chairmandesk'])
@push('styles')
<style>
    .chairman-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .chairman-content {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
        height: 100%;
    }
    
    .chairman-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .chairman-section h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: #8ea139;
    }
    
    .chairman-section p {
        color: #555;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    
    .chairman-image {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        height: 100%;
    }
    
    .chairman-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .chairman-image:hover img {
        transform: scale(1.03);
    }
    
    .chairman-signature {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }
    
    .chairman-signature p {
        margin-bottom: 5px;
        color: #333;
    }
    
    .chairman-signature p:first-child {
        font-size: 1.2rem;
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .chairman-content {
            margin-bottom: 30px;
        }
        
        .chairman-image {
            max-height: 400px;
        }
    }
    
    @media (max-width: 768px) {
        .chairman-section {
            padding: 60px 0;
        }
        
        .chairman-content {
            padding: 30px;
        }
    }
    
    @media (max-width: 576px) {
        .chairman-section {
            padding: 40px 0;
        }
        
        .chairman-section h2 {
            font-size: 1.8rem;
        }
        
        .chairman-content {
            padding: 25px;
        }
    }
</style>
@endpush

@section('content')
<div class="chairman-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Content Column -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-lg-1 order-2">
                <div class="chairman-content">
                    <h2>Chairman's Desk</h2>
                    <p>Vishal International School stands at the threshold of changing global patterns and perspectives where every new day dawns with new challenges. Our strong academic thrust is supplemented with providing direction and guidance to young learners to understand the changing social values, norms and societal pressures, so that they may take informed decisions.</p>
                    <p>Our endeavor is to nurture moral and intellectual leaders, individuals with dignity, integrity and compassion who want to make a positive difference in the world.</p>
                    <p>The school aims at providing an all-round education and trains the students intellectually, morally, spiritually and physically so as to inculcate in them the right principles of conduct and the right attitude in life, thereby enabling them to become loyal and useful citizens of our country.</p>
                    
                    <div class="chairman-signature">
                        <p><strong>Mrs. Vimlesh Yadav</strong></p>
                        <p><strong>Chairman</strong></p>
                    </div>
                </div>
            </div>
            
            <!-- Image Column -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-lg-2 order-1 mb-lg-0 mb-4">
                <div class="chairman-image">
                    <img src="{{ asset('frontend/images/chairmen.jpg')}}" alt="Mrs. Vimlesh Yadav, Chairman of Vishal International School" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection