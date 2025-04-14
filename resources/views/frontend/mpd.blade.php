@extends('frontend.layout.master', ['page_title' => 'Mandatory Public Disclosure'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/principal-desk.css') }}"/>
@endpush

@section('content')
<div class="container about-section">
    <div class="container about-section">
        <div class="row principal-section" style="text-align:justify">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2 class="pt-4">Mandatory Public Disclosure</h2>

                <p></p>
                <div class="table-responsive">

                    <table border="" style="" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>SL No.</th>
                                <th>Information</th>
                                <th class="text-center">Documents</th>
                            </tr>
                            @php
                                $sequenceNumber = 1; 
                                @endphp
                                @foreach ($mpds as $mpd)
                            <tr>
                                <td><b>{{$sequenceNumber}}.</b></td>
                                <td>{{ $mpd->name}}</td>
                                <td class="text-center"> @if (Str::endsWith($mpd->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ asset($mpd->file_path) }}" alt="Image" width="100">
                                @elseif (Str::endsWith($mpd->file_path, '.pdf'))
                                    <a href="{{ asset($mpd->file_path) }}" target="_blank" style="color:#e2002d">View </a>
                                @endif</td>
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