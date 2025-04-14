@extends('frontend.layout.master', ['page_title' => 'Syllabus'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/principal-desk.css') }}"/>
@endpush

@section('content')
<div class="container about-section">
    <div class="container about-section">
        <div class="row principal-section" style="text-align:justify">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2 class="pt-4 font-weight-bold">Syllabus</h2>

                <p></p>
                <div class="table-responsive">

                    <table border="" style="" class="table table-bordered table-striped">
                        <tbody>
                        
                            <tr>
                                <th>Sr No.</th>
                                <th>Class</th>
                                <th>View / Download</th>
                            </tr>
                            
                             @php
                            $sequenceNumber = 1; 
                            @endphp
                            @foreach ($syllabuss as $syllabus)

                            <tr>
                                <td><b>{{$sequenceNumber}}.</b></td>
                                <td>{{ $syllabus->name}}</td>
                                <td class="">
                                    @if (Str::endsWith($syllabus->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ asset($syllabus->file_path) }}" alt="Image" width="100">
                                @elseif (Str::endsWith($syllabus->file_path, '.pdf'))
                                    <a href="{{ asset($syllabus->file_path) }}" target="_blank">View / Download</a>
                                @endif
                                </td>
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