@extends('frontend.layout.master', ['page_title' => 'Holidays'])
@push('styles')
    <style>
        .holidays-section {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .holidays-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 40px;
        }

        .holidays-title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }

        .holidays-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: #3498db;
        }

        .holidays-table {
            width: 100%;
            border-collapse: collapse;
        }

        .holidays-table th {
            background-color: #3498db;
            color: white;
            padding: 12px 15px;
            text-align: left;
        }

        .holidays-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .holidays-table tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .holidays-table tr:hover {
            background-color: #e8f4fc;
        }

        .holiday-name {
            font-weight: 600;
            color: #2c3e50;
        }

        .holiday-date {
            white-space: nowrap;
        }

        .holiday-day {
            color: #e74c3c;
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .holidays-section {
                padding: 60px 0;
            }

            .holidays-container {
                padding: 30px;
            }

            .holidays-table {
                display: block;
                overflow-x: auto;
            }
        }

        @media (max-width: 576px) {
            .holidays-section {
                padding: 40px 0;
            }

            .holidays-title {
                font-size: 1.8rem;
            }

            .holidays-container {
                padding: 20px;
            }

            .holidays-table td,
            .holidays-table th {
                white-space: normal;
                word-break: break-word;
                vertical-align: top;
            }

            .holiday-name,
            .holiday-date,
            .holiday-day {
                display: block;
            }

            .holidays-table td:first-child,
            .holidays-table th:first-child {
                min-width: 50px;
                text-align: center;
            }

            .holiday-date {
                white-space: normal;
            }
        }
    </style>
@endpush

@section('content')
    <div class="holidays-section">
        <div class="container">
            <div class="holidays-container">
                <h2 class="holidays-title">Holiday List: {{ $holidayYear }}</h2>

                <div class="table-responsive">
                    <table class="holidays-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name of the Festival</th>
                                <th>Date</th>
                                <th>Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sequenceNumber = 1; @endphp
                            @foreach ($festivals as $festival)
                                <tr>
                                    <td><strong>{{ $sequenceNumber }}.</strong></td>
                                    <td class="holiday-name">{{ $festival->name }}</td>
                                    <td class="holiday-date">{{ \Carbon\Carbon::parse($festival->date)->format('d/m/Y') }}
                                    </td>
                                    <td class="holiday-day">{{ \Carbon\Carbon::parse($festival->date)->format('l') }}</td>
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
