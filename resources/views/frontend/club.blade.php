@extends('frontend.layout.master', ['page_title' => 'SUPW/Club Activities'])
@push('styles')
<style>
    .club-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .club-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .club-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 40px;
    }
    
    .club-intro {
        flex: 1;
        min-width: 300px;
    }
    
    .club-image {
        flex: 1;
        min-width: 300px;
        text-align: center;
        padding: 20px;
    }
    
    .club-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .club-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .club-section h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #e74c3c;
    }
    
    .club-section h3 {
        font-weight: 600;
        color: #2c3e50;
        margin: 30px 0 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f1f1f1;
    }
    
    .club-section p {
        color: #555;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    
    .club-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin: 20px 0 40px;
    }
    
    .club-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .club-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    
    .club-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .club-card:hover img {
        transform: scale(1.05);
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .club-gallery {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .club-section {
            padding: 60px 0;
        }
        
        .club-container {
            padding: 30px;
        }
        
        .club-header {
            flex-direction: column;
        }
        
        .club-intro, .club-image {
            min-width: 100%;
        }
        
        .club-image {
            padding: 20px 0;
            order: -1;
        }
    }
    
    @media (max-width: 576px) {
        .club-section {
            padding: 40px 0;
        }
        
        .club-container {
            padding: 20px;
        }
        
        .club-section h2 {
            font-size: 1.8rem;
        }
        
        .club-gallery {
            grid-template-columns: 1fr;
        }
        
        .club-card img {
            height: 200px;
        }
    }
</style>
@endpush

@section('content')
<div class="club-section">
    <div class="container">
        <div class="club-container">
            <div class="club-header">
                <div class="club-intro">
                    <h2>Socially Useful Productive Work/CLUBS</h2>
                    <p>As per CBSE Guidelines the school has implemented SUPW / Club Activity Classes for students of Classes II to VIII. The various socially useful activity Clubs include Art & Craft Club, Yoga Club, Karate Club, Dance Club, Music Club, Skating Club, Science Club, Literary (English and Hindi) Club, Social Science Club and Mathematics Club.</p>
                </div>
                <div class="club-image">
                    <img src="{{ asset('frontend/images/club.png') }}" alt="Club Activities at School">
                </div>
            </div>

            <!-- Literary Club -->
            <div class="club-activity">
                <h3>Literary (English & Hindi) Club</h3>
                <p>Literary Club serves important function allowing participants to use and practice Literature in an informal setting. Activities such as debates, speeches, recitation, plays, storytelling etc. are held in these clubs.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Hindi.jpg') }}" alt="Hindi Literary Club Activity">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Eng.jpg') }}" alt="English Literary Club Activity">
                    </div>
                </div>
            </div>

            <!-- Science Club -->
            <div class="club-activity">
                <h3>Science Club</h3>
                <p>Science club helps in the development of scientific attitude and develops a genuine interest in science and scientific activities, supplements the work of classroom and the laboratory.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Science 1.jpg') }}" alt="Science Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Science 2.jpg') }}" alt="Science Club Activity 2">
                    </div>
                </div>
            </div>

            <!-- Mathematics Club -->
            <div class="club-activity">
                <h3>Mathematics Club</h3>
                <p>The Math Club is intended to give students a platform to share their interests in mathematics. Typical activities include problem solving sessions, puzzle solving, reasoning, student talks etc.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/maths 1.jpg') }}" alt="Math Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/maths 2.jpg') }}" alt="Math Club Activity 2">
                    </div>
                </div>
            </div>

            <!-- Social Science Club -->
            <div class="club-activity">
                <h3>Social Science Club</h3>
                <p>Social Science Club aims at making children capable of becoming responsible, productive and useful members of society. It creates interest and makes the students active in the subject and encourages intellectual curiosity among the students.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/S Sc 1.jpg') }}" alt="Social Science Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/S Sc 2.jpg') }}" alt="Social Science Club Activity 2">
                    </div>
                </div>
            </div>

            <!-- Art and Craft Club -->
            <div class="club-activity">
                <h3>Art and Craft Club</h3>
                <p>Art & Craft club is a platform to develop aesthetic values and enhance the creative skills and artistic talents of students.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Art 1.jpg') }}" alt="Art Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Art 2.jpg') }}" alt="Art Club Activity 2">
                    </div>
                </div>
            </div>

            <!-- Music Club -->
            <div class="club-activity">
                <h3>Music Club</h3>
                <p>The purpose of Music Club is to facilitate music education, provide a practice space for students and coordinate student performances on and off-campus.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Music 1.jpeg') }}" alt="Music Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Music 2.jpeg') }}" alt="Music Club Activity 2">
                    </div>
                </div>
            </div>

            <!-- Dance Club -->
            <div class="club-activity">
                <h3>Dance Club</h3>
                <p>The purpose of the Dance Club is to teach students in dance styles from different cultural backgrounds such Classical, Contemporary, Salsa, Modern and Hip Hop.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Dance 1.jpeg') }}" alt="Dance Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Dance 2.jpeg') }}" alt="Dance Club Activity 2">
                    </div>
                </div>
            </div>

            <!-- Karate Club -->
            <div class="club-activity">
                <h3>Karate Club</h3>
                <p>The purpose of Karate Club is to develop well-balanced mind and body, through training in fighting techniques. It trains students in Self Defense.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Karate 1.jpg') }}" alt="Karate Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Karate 2.jpg') }}" alt="Karate Club Activity 2">
                    </div>
                </div>
            </div>

            <!-- Yoga Club -->
            <div class="club-activity">
                <h3>Yoga Club</h3>
                <p>The objective of yoga club is to practice yoga postures while learning about how yoga can be used to manage stress, improve the mind-body connection, and increase strength and flexibility.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/yoga 1.jpg') }}" alt="Yoga Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/yoga 2.jpg') }}" alt="Yoga Club Activity 2">
                    </div>
                </div>
            </div>

            <!-- Skating Club -->
            <div class="club-activity">
                <h3>Skating Club</h3>
                <p>Skating Club trains students in skating (both Quad and Liner) and prepare them for various levels of skating competition.</p>
                <div class="club-gallery">
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Skating 1.jpg') }}" alt="Skating Club Activity 1">
                    </div>
                    <div class="club-card">
                        <img src="{{ asset('supwclub/Skating 2.jpg') }}" alt="Skating Club Activity 2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection