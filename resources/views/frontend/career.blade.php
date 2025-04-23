@extends('frontend.layout.master', ['page_title' => 'Career'])
@push('styles')
<style>
    .career-section {
        background: #f8f9fa;
        padding: 80px 0 60px;
    }
    
    .career-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
        margin-top: 20px;
    }
    
    .career-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .career-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .career-info {
        background-color: #e7f5ff;
        border-left: 4px solid #3498db;
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 0 4px 4px 0;
    }
    
    .career-text {
        color: #555;
        line-height: 1.8;
        font-size: 1.1rem;
    }
    
    .email-link {
        color: #e74c3c;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .email-link:hover {
        color: #c0392b;
        text-decoration: underline;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .career-section {
            padding: 60px 0 40px;
        }
        
        .career-container {
            padding: 30px;
        }
        
        .career-info {
            padding: 25px;
        }
    }
    
    @media (max-width: 576px) {
        .career-section {
            padding: 40px 0;
        }
        
        .career-title {
            font-size: 1.8rem;
        }
        
        .career-container {
            padding: 20px;
        }
        
        .career-text {
            font-size: 1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="career-section">
    <div class="container">
        <div class="career-container">
            <h2 class="career-title">Career at DUV International School</h2>
            
            <div class="career-info">
                <p class="career-text">
                    DUV International School is a leading CBSE affiliated Senior Secondary School in Greater Noida West Area. 
                    We are looking for passionate educators to join our team.
                </p>
                
                <h4 class="mt-4 mb-3">Requirements:</h4>
                <ul class="career-text">
                    <li>Minimum 2 years of teaching experience</li>
                    <li>Excellent communication skills</li>
                    <li>Relevant educational qualifications</li>
                    <li>Passion for teaching and student development</li>
                </ul>
                
                <p class="career-text mt-4">
                    Interested candidates should send their CV along with a cover letter to:<br>
                    <a href="mailto:duvinternationalschool@gmail.com" class="email-link">duvinternationalschool@gmail.com</a>
                </p>
                
                <p class="career-text mt-3">
                    Shortlisted candidates will be contacted for interviews. We appreciate all applications 
                    but only qualified candidates will be contacted.
                </p>
            </div>
            
            <div class="additional-info mt-5">
                <h4 class="mb-3">Why Join Our Team?</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="feature-box mb-4">
                            <i class="fa fa-chalkboard-teacher feature-icon"></i>
                            <div class="feature-content">
                                <h5>Professional Growth</h5>
                                <p class="career-text">Regular training and development opportunities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-box mb-4">
                            <i class="fa fa-school feature-icon"></i>
                            <div class="feature-content">
                                <h5>Modern Facilities</h5>
                                <p class="career-text">State-of-the-art infrastructure and resources</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-box mb-4">
                            <i class="fa fa-users feature-icon"></i>
                            <div class="feature-content">
                                <h5>Supportive Environment</h5>
                                <p class="career-text">Collaborative and positive work culture</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-box mb-4">
                            <i class="fa fa-child feature-icon"></i>
                            <div class="feature-content">
                                <h5>Student-Centered</h5>
                                <p class="career-text">Focus on holistic student development</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection