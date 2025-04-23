@extends('frontend.layout.master', ['page_title' => 'Syllabus'])
@push('styles')
<style>
    .syllabus-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .syllabus-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .syllabus-section h2 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .syllabus-section h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .syllabus-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .syllabus-table thead th {
        background-color: #3498db;
        color: white;
        padding: 12px 15px;
        text-align: left;
    }
    
    .syllabus-table tbody td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .syllabus-table tbody tr:hover {
        background-color: #f5f5f5;
    }
    
    .syllabus-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .view-link {
        color: #3498db;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .view-link:hover {
        color: #2980b9;
        text-decoration: underline;
    }
    
    .preview-image {
        max-width: 100px;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        transition: transform 0.3s ease;
    }
    
    .preview-image:hover {
        transform: scale(1.05);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .syllabus-section {
            padding: 60px 0;
        }
        
        .syllabus-container {
            padding: 30px;
        }
        
        .syllabus-table thead {
            display: none;
        }
        
        .syllabus-table tbody tr {
            display: block;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
        }
        
        .syllabus-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .syllabus-table tbody td:before {
            content: attr(data-label);
            font-weight: 600;
            color: #2c3e50;
            margin-right: 15px;
        }
        
        .syllabus-table tbody td:last-child {
            border-bottom: none;
        }
    }
    
    @media (max-width: 576px) {
        .syllabus-section {
            padding: 40px 0;
        }
        
        .syllabus-section h2 {
            font-size: 1.8rem;
        }
        
        .syllabus-container {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="syllabus-section">
    <div class="container">
        <div class="syllabus-container">
            <h2>Syllabus</h2>
            
            <div class="table-responsive">
                <table class="syllabus-table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Class</th>
                            <th>View / Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sequenceNumber = 1; @endphp
                        @foreach ($syllabuss as $syllabus)
                        <tr>
                            <td data-label="Sr No."><b>{{ $sequenceNumber }}.</b></td>
                            <td data-label="Class">{{ $syllabus->name }}</td>
                            <td data-label="View/Download" class="">
                                @if (Str::endsWith($syllabus->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ asset($syllabus->file_path) }}" alt="Syllabus Preview" class="preview-image">
                                @elseif (Str::endsWith($syllabus->file_path, '.pdf'))
                                    <a href="{{ asset($syllabus->file_path) }}" target="_blank" class="view-link">View / Download</a>
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