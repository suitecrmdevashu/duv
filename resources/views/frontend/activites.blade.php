@extends('frontend.layout.master', ['page_title' => 'Activities'])
@push('styles')
<style>
    .activities-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .activities-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    .activities-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .activities-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }
    
    .activities-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .activities-table th {
        background-color: #3498db;
        color: white;
        padding: 12px 15px;
        text-align: left;
    }
    
    .activities-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
        vertical-align: top;
    }
    
    .activities-table tr:nth-child(even) {
        background-color: #f5f5f5;
    }
    
    .activities-table tr:hover {
        background-color: #e8f4fc;
    }
    
    .activity-name {
        font-weight: 600;
        color: #2c3e50;
    }
    
    .activity-date {
        white-space: nowrap;
        color: #7f8c8d;
    }
    
    .activity-details {
        line-height: 1.6;
        word-break: break-word; /* 🔥 Wrap long words */
    white-space: pre-wrap;
    }
    
    .activity-details ul {
        padding-left: 20px;
        margin-bottom: 0;
    }
    
    .activity-details li {
        margin-bottom: 5px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .activities-section {
            padding: 60px 0;
        }
        
        .activities-container {
            padding: 30px;
        }
        
        .activities-table {
            display: block;
            overflow-x: auto;
        }
    }
    
    @media (max-width: 576px) {
        .activities-section {
            padding: 40px 0;
        }
        
        .activities-title {
            font-size: 1.8rem;
        }
        
        .activities-container {
            padding: 20px;
        }
        
        .activities-table th,
        .activities-table td {
            padding: 8px 10px;
            font-size: 0.9rem;
        }
        
        .activity-date {
            white-space: normal;
        }
    }
</style>
@endpush

@section('content')
<div class="activities-section">
    <div class="container">
        <div class="activities-container">
            @php
                $currentYear = date('Y');
                $nextYear = date('Y') + 1;
            @endphp
            <h2 class="activities-title">Activity Schedule {{ $currentYear }}-{{ $nextYear }}</h2>
            
            <div class="table-responsive">
                <table class="activities-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Celebration</th>
                            <th>Date</th>
                            <th>Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sequenceNumber = 1; @endphp
                        @foreach ($activities as $activity)
                        <tr>
                            <td><strong>{{ $sequenceNumber }}.</strong></td>
                            <td class="activity-name">{{ $activity->name }}</td>
                            <td class="activity-date">{{ \Carbon\Carbon::parse($activity->date)->format('jS F Y') }}</td>
                            <td class="activity-details">{!! nl2br(strip_tags($activity->activity)) !!}</td>

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