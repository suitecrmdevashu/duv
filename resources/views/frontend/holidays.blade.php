@extends('frontend.layout.master', ['page_title' => 'Holidays'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/principal-desk.css') }}"/>
@endpush

@section('content')
<div class="container about-section">
    <div class="container about-section">
        <div class="row principal-section" style="text-align:justify">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2 class="pt-4 font-weight-bold">Holiday List : {{ $holidayYear}}</h2>

                <p></p>
                <div class="table-responsive">

                    <table border="" style="" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>S.No</th>
                                <th>Name of the Festival</th>
                                <th>Date</th>
                                <th>Day</th>
                            </tr>
                            @php
                            $sequenceNumber = 1; 
                            @endphp
                            @foreach ($festivals as $festival)
                            <tr>
                                <td><b>{{$sequenceNumber}}.</b></td>
                                <td>{{ $festival->name}}</td>
                                <td>{{ \Carbon\Carbon::parse($festival->date)->format('d/m/y') }}</td>
                                <td>{{\Carbon\Carbon::parse($festival->date)->format('l')}}</td>
                            </tr>
                            @php
                            $sequenceNumber++; 
                        @endphp
                           @endforeach
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
</div>

@endsection