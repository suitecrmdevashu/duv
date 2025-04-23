@extends('frontend.layout.master', ['page_title' => 'Curriculum'])
@push('styles')
<style>
    .curriculum-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .curriculum-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .curriculum-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .curriculum-section h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #e74c3c;
    }
    
    .curriculum-highlight {
        background-color: #fff9e6;
        border-left: 4px solid #e74c3c;
        padding: 30px;
        border-radius: 0 4px 4px 0;
    }
    
    .curriculum-content {
        color: #555;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    
    .stream-list {
        margin: 20px 0;
        padding-left: 20px;
    }
    
    .stream-list li {
        margin-bottom: 8px;
        position: relative;
    }
    
    .stream-list li:before {
        content: '•';
        color: #f39c12;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .curriculum-section {
            padding: 60px 0;
        }
        
        .curriculum-container {
            padding: 30px;
        }
        
        .curriculum-highlight {
            padding: 25px;
        }
    }
    
    @media (max-width: 576px) {
        .curriculum-section {
            padding: 40px 0;
        }
        
        .curriculum-section h2 {
            font-size: 1.8rem;
        }
        
        .curriculum-container {
            padding: 20px;
        }
        
        .curriculum-highlight {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="curriculum-section">
    <div class="container">
        <div class="curriculum-container">
            <h2>Curriculum</h2>
            
            <div class="curriculum-highlight">
                <div class="curriculum-content">
                    <p>The school is affiliated to Central Board of Secondary Education and prepares the students for AISSE (All India Secondary School Examination) and AISSCE (All India Senior School Certificate Examination), following 10+2 pattern of Education.</p>
                    
                    <p>Streams Available:</p>
                    <ul class="stream-list">
                        <li>Science</li>
                        <li>Commerce</li>
                        <li>Humanities/Arts</li>
                    </ul>
                    
                    <p>The medium of instruction is English.</p>
                    
                    <p>The school has had an excellent record in results. In addition to Academics, the school seeks to ingrain the Civic and Moral Values in Education.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection