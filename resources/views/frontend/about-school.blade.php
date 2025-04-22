@extends('frontend.layout.master', ['page_title' => 'about-school'])
@push('styles')
    <style>
        /* Impact Section - Professional Styling */
        .impact-section {
            padding: 60px 0;
        }
        
        .impact-section h1 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
        }
        
        .impact-section h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #8ea139;
        }
        
        .impact-content {
            max-width: 800px;
            margin: 30px auto 0;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }
        
        .impact-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 40px;
            margin-bottom: 40px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .impact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .impact-content {
                padding: 0 20px;
            }
        }
        
        @media (max-width: 768px) {
            .impact-section h1 {
                font-size: 2rem;
            }
            
            .impact-content {
                font-size: 1rem;
            }
            
            .impact-card {
                padding: 30px 20px;
            }
        }
        
        @media (max-width: 576px) {
            .impact-section {
                padding: 40px 0;
            }
            
            .impact-section h1 {
                font-size: 1.8rem;
            }
            
            .impact-content {
                padding: 0 15px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="impact-section">
        <div class="container">
            <!-- About School -->
            <div class="impact-card" data-aos="fade-up" data-aos-duration="1000">
                <h1>About School</h1>
                <div class="impact-content" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <p><strong>Vishal International School</strong>, was established in 2006 in Tigri, Greater Noida (West) in the memory of LATE SHRI INDER YADAV (A National Level Wrestler) by Vimlesh Yadav. The school has a Vision of new world in which relationships are governed by the spirit of universal fraternity. The school functions under the guidance of eminent Educationalists drawn from different fields of Education, Science and Technology. The School has won laurels at state, as well as National levels.</p>
                </div>
            </div>
            
            <!-- Academics -->
            <div class="impact-card" data-aos="fade-up" data-aos-duration="1000">
                <h1>Academics</h1>
                <div class="impact-content" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <p>The School is affiliated to Central Board of Secondary Education New Delhi and prepares the students for (AISSCS) & (AISSE). It prepares students for All India Secondary School Examination and All India Senior School Certificate Examination, following 10+2 Pattern of Education.</p>
                    <p class="mt-3">Streams available: Science, Commerce, Humanities/Arts. The Medium of Instruction is English. The School has, had an excellent record in Examination. In addition to Academics the School seeks to ingrain the Civic and Moral Values to the Students.</p>
                </div>
            </div>
            
            <!-- Amenities / Facilities -->
            <div class="impact-card" data-aos="fade-up" data-aos-duration="1000">
                <h1>Amenities / Facilities</h1>
                <div class="impact-content" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <p>The School has Specious and Modern Laboratories for Physics, Chemistry, Biology & Computer and Smart Classes. Besides Art and Craft Rooms, a separate work experience block has been designed to reveal the hidden talent of our students in different activities.</p>
                    <p class="mt-3">An infirmary is equipped with Medical and Nursing care for the students in case of any eventuality. Extra curricular activities like Dance, Music, Taekwondo, Skating are also the part of curriculum.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
