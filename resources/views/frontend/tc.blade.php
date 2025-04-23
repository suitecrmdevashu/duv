@extends('frontend.layout.master', ['page_title' => 'Transfer Certificate'])
@push('styles')
<style>
    .tc-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .tc-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .tc-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .tc-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .tc-accordion .card {
        margin-bottom: 15px;
        border: none;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    
    .tc-accordion .card-header {
        background-color: #e7f5ff;
        border-bottom: none;
        padding: 0;
    }
    
    .tc-accordion .btn-link {
        width: 100%;
        text-align: left;
        color: #2c3e50;
        font-weight: 600;
        text-decoration: none;
        padding: 15px 20px;
        position: relative;
    }
    
    .tc-accordion .btn-link:after {
        content: '\f078';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        right: 20px;
        transition: all 0.3s ease;
    }
    
    .tc-accordion .btn-link.collapsed:after {
        transform: rotate(-90deg);
    }
    
    .tc-accordion .card-body {
        padding: 20px;
    }
    
    .search-form {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }
    
    .search-form input {
        flex: 1;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    .search-form button {
        background: #3498db;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .search-form button:hover {
        background: #2980b9;
    }
    
    .tc-image-container {
        margin-top: 20px;
        text-align: center;
    }
    
    .tc-image-container img {
        max-width: 100%;
        height: auto;
        border: 1px solid #eee;
        border-radius: 4px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    
    .download-btn {
        display: inline-block;
        margin-top: 15px;
        background: #2ecc71;
        color: white;
        padding: 8px 20px;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .download-btn:hover {
        background: #27ae60;
        transform: translateY(-2px);
    }
    
    .not-found {
        color: #e74c3c;
        padding: 15px;
        background: #fde8e8;
        border-radius: 4px;
        text-align: center;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .tc-section {
            padding: 60px 0;
        }
        
        .tc-container {
            padding: 30px;
        }
        
        .search-form {
            flex-direction: column;
        }
    }
    
    @media (max-width: 576px) {
        .tc-section {
            padding: 40px 0;
        }
        
        .tc-title {
            font-size: 1.8rem;
        }
        
        .tc-container {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="tc-section">
    <div class="container">
        <div class="tc-container">
            <h2 class="tc-title">Transfer Certificate</h2>
            
            <div class="tc-accordion">
                @foreach ($tcYears as $tcYear)
                <div class="accordion" id="accordionTC{{ $tcYear->id }}">
                    <div class="card">
                        <div class="card-header" id="headingTC{{ $tcYear->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTC{{ $tcYear->id }}" aria-expanded="false"
                                    aria-controls="collapseTC{{ $tcYear->id }}">
                                    {{ $tcYear->year }} Transfer Certificates
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTC{{ $tcYear->id }}" class="collapse" aria-labelledby="headingTC{{ $tcYear->id }}" 
                            data-parent="#accordionTC{{ $tcYear->id }}">
                            <div class="card-body">
                                <div class="search-form">
                                    <input type="hidden" class="tcYearId" value="{{ $tcYear->id }}">
                                    <input type="number" class="sequence_number" placeholder="Enter Admission Number" required>
                                    <button type="button" class="searchButton">Search</button>
                                </div>
                                <div class="tc-image-container">
                                    <!-- Image and download button will appear here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.searchButton').click(function() {
        var cardBody = $(this).closest('.card-body');
        var tcYearId = cardBody.find('.tcYearId').val();
        var sequenceNumber = cardBody.find('.sequence_number').val();
        var imageContainer = cardBody.find('.tc-image-container');
        
        if (!sequenceNumber) {
            imageContainer.html('<div class="not-found">Please enter an admission number</div>');
            return;
        }

        imageContainer.html('<div class="text-center py-3"><i class="fas fa-spinner fa-spin fa-2x"></i><p>Loading...</p></div>');

        $.ajax({
            url: '/get-image',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'tcYearId': tcYearId,
                'sequenceNumber': sequenceNumber
            },
            success: function(data) {
                if (data.image_path) {
                    var imgTag = '<img src="' + data.image_path + '" alt="Transfer Certificate" class="img-fluid mb-3">';
                    var downloadBtn = '<a href="' + data.image_path + '" download="TC_AdmNo_' + sequenceNumber + '.jpg" class="download-btn"><i class="fas fa-download mr-2"></i>Download T.C.</a>';
                    imageContainer.html(imgTag + downloadBtn);
                } else {
                    imageContainer.html('<div class="not-found">Transfer Certificate not found for the specified admission number</div>');
                }
            },
            error: function() {
                imageContainer.html('<div class="not-found">An error occurred while processing your request</div>');
            }
        });
    });

    // Allow pressing Enter key to trigger search
    $('.sequence_number').keypress(function(e) {
        if (e.which === 13) {
            $(this).closest('.card-body').find('.searchButton').click();
            return false;
        }
    });
});
</script>
@endpush