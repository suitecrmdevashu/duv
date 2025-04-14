@extends('frontend.layout.master', ['page_title' => 'Latest News & Announcements'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Latest News & Announcements</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align:justify">
            <div class="row news-row">
                @foreach ($lnas as $lna)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert" style="text-align:justify">
                    <div class="card news-card">
                        <div class="card-body">
                          <h5 class="card-title news-title text-center">{{$lna->caption}}</h5>
                          @if (Str::endsWith($lna->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img src="{{ asset($lna->file_path) }}" alt="Image" width="100">
                    @elseif (Str::endsWith($lna->file_path, '.pdf'))
                        <a id="download-link" href="{{ asset($lna->file_path) }}" target="_blank" download>Download PDF</a>
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