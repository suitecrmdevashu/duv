@extends('frontend.layout.master', ['page_title' => 'Teaching-Methodology'])
@push('styles')
<style>
    .teaching-methodology-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .methodology-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
        position: relative;
        overflow: hidden;
    }
    
    .methodology-container:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: #e74c3c;
    }
    
    .teaching-methodology-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .teaching-methodology-section h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #e74c3c;
    }
    
    .methodology-content {
        color: #555;
        line-height: 1.8;
        font-size: 16px;
    }
    
    .methodology-highlight {
        background-color: #fde8e6;
        border-left: 4px solid #e74c3c;
        padding: 20px;
        margin: 20px 0;
        border-radius: 0 4px 4px 0;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .teaching-methodology-section {
            padding: 60px 0;
        }
        
        .methodology-container {
            padding: 30px;
        }
    }
    
    @media (max-width: 576px) {
        .teaching-methodology-section {
            padding: 40px 0;
        }
        
        .teaching-methodology-section h2 {
            font-size: 1.8rem;
        }
        
        .methodology-container {
            padding: 25px;
        }
    }
</style>
@endpush

@section('content')
<div class="teaching-methodology-section">
    <div class="container">
        <div class="methodology-container">
            <h2>Teaching Methodology</h2>
            <div class="methodology-highlight">
                <div class="methodology-content">
                    <p>It comprises of the principles and methods used by teachers to enable student learning. The strategies are determined partly on the subject matter to be taught and partly by the nature of learning.</p>
                    <p class="mt-3">Our methodologies include:</p>
                    <ul class="mt-3">
                        <li>Audio Lingual approach</li>
                        <li>Demonstration (Showing & Telling)</li>
                        <li>Worked examples</li>
                        <li>Interactive Lecture-Discussion Based</li>
                        <li>Problem Solving Based</li>
                        <li>Project Based learning</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection