@extends('frontend.layout.master', ['page_title' => 'Latest News & Announcements'])
@push('styles')
<style>
    .news-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .news-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .news-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .news-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
    }
    
    .news-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        border: none;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .news-card .card-body {
        padding: 25px;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .news-card-title {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        text-align: center;
        font-size: 1.25rem;
    }
    
    .news-media {
        margin: 15px 0;
        text-align: center;
    }
    
    .news-image {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        max-height: 200px;
        object-fit: contain;
    }
    
    .news-pdf-link {
        display: inline-block;
        background: #e74c3c;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    
    .news-pdf-link:hover {
        background: #c0392b;
        transform: translateY(-2px);
    }
    
    .news-pdf-link i {
        margin-right: 8px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .news-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .news-section {
            padding: 60px 0;
        }
        
        .news-container {
            padding: 30px;
        }
    }
    
    @media (max-width: 576px) {
        .news-section {
            padding: 40px 0;
        }
        
        .news-title {
            font-size: 1.8rem;
        }
        
        .news-container {
            padding: 20px;
        }
        
        .news-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="news-section">
    <div class="container">
        <div class="news-container">
            <h2 class="news-title">Latest News & Announcements</h2>
            
            <div class="news-grid">
                @foreach ($lnas as $lna)
                <div class="news-card">
                    <div class="card-body">
                        <h5 class="news-card-title">{{ $lna->caption }}</h5>
                        
                        <div class="news-media">
                            @if (Str::endsWith($lna->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                <img src="{{ asset($lna->file_path) }}" class="news-image" alt="{{ $lna->caption }}">
                            @elseif (Str::endsWith($lna->file_path, '.pdf'))
                                <a href="{{ asset($lna->file_path) }}" target="_blank" class="news-pdf-link">
                                    <i class="fas fa-file-pdf"></i> View Announcement
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection