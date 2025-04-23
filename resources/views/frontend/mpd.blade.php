@extends('frontend.layout.master', ['page_title' => 'Mandatory Public Disclosure'])
@push('styles')
<style>
    .disclosure-section {
        background: #f8f9fa;
        padding: 60px 0;
    }
    
    .disclosure-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .disclosure-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .disclosure-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .disclosure-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    .disclosure-table th {
        background-color: #3498db;
        color: white;
        padding: 12px 15px;
        text-align: left;
    }
    
    .disclosure-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
        vertical-align: middle;
    }
    
    .disclosure-table tr:nth-child(even) {
        background-color: #f5f5f5;
    }
    
    .disclosure-table tr:hover {
        background-color: #e8f4fc;
    }
    
    .document-link {
        color: #e2002d;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .document-link:hover {
        color: #b30000;
        text-decoration: underline;
    }
    
    .document-image {
        max-width: 100px;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: transform 0.3s ease;
    }
    
    .document-image:hover {
        transform: scale(1.05);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .disclosure-section {
            padding: 40px 0;
        }
        
        .disclosure-container {
            padding: 30px;
        }
        
        .disclosure-table {
            display: block;
            overflow-x: auto;
        }
    }
    
    @media (max-width: 576px) {
        .disclosure-title {
            font-size: 1.5rem;
        }
        
        .disclosure-container {
            padding: 20px;
        }
        
        .disclosure-table th,
        .disclosure-table td {
            padding: 8px 10px;
            font-size: 0.9rem;
        }
    }
</style>
@endpush

@section('content')
<div class="disclosure-section">
    <div class="container">
        <div class="disclosure-container">
            <h2 class="disclosure-title">Mandatory Public Disclosure</h2>
            
            <div class="table-responsive">
                <table class="disclosure-table">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Information</th>
                            <th>Documents</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sequenceNumber = 1; @endphp
                        @foreach ($mpds as $mpd)
                        <tr>
                            <td><strong>{{ $sequenceNumber }}.</strong></td>
                            <td>{{ $mpd->name }}</td>
                            <td>
                                @if (Str::endsWith($mpd->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ asset($mpd->file_path) }}" alt="{{ $mpd->name }}" class="document-image">
                                @elseif (Str::endsWith($mpd->file_path, '.pdf'))
                                    <a href="{{ asset($mpd->file_path) }}" target="_blank" class="document-link">
                                        View PDF <i class="fas fa-external-link-alt ml-1"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @php $sequenceNumber++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection