@extends('frontend.layout.master', ['page_title' => 'Transfer Certificate'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Transfer Certificate</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-info" style="text-align:justify">
            @foreach ($tcYears as $tcYear)
            <div class="accordion" id="accordionExample{{ $tcYear->id }}"> <!-- Add the unique ID here -->
                <div class="card">
                    <div class="card-header" id="headingOne{{ $tcYear->id }}"> <!-- Add the unique ID here -->
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse{{ $tcYear->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $tcYear->id }}">
                                {{ $tcYear->year }}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse{{ $tcYear->id }}" class="collapse" aria-labelledby="headingOne{{ $tcYear->id }}" 
                        data-parent="#accordionExample{{ $tcYear->id }}"> 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <form id="searchForm{{ $tcYear->id }}">
                                        <input type="hidden" class="tcYearId" value="{{ $tcYear->id }}"> <!-- Use class instead of ID -->
                                        <input type="number" class="sequence_number" placeholder="Enter Admission No.">
                                        <button type="button" class="searchButton btn-primary">Search</button> <!-- Use class instead of ID -->
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="imageContainer">
                                    <!-- Image will be displayed here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    $('.searchButton').click(function () {
        var tcYearId = $(this).closest('div').find('.tcYearId').val();
        var sequenceNumber = $(this).closest('div').find('.sequence_number').val();
        var imageContainer = $(this).closest('.card-body').find('.imageContainer'); // Updated selector

        $.ajax({
            url: '/get-image',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'tcYearId': tcYearId,
                'sequenceNumber': sequenceNumber
            },
            success: function (data) {
                if (data.image_path) {
                    var imgTag = '<img src="' + data.image_path + '" alt="Image" style="max-width: 100%; height: 300px;">';
                    var downloadButton = '<a href="' + data.image_path + '" download="image.jpg" class="btn btn-primary mt-2">Download T.C</a>';
                    imageContainer.html(imgTag + downloadButton);
                } else {
                    imageContainer.html('Image not found for the specified sequence number.');
                }
            }
        });
    });
});
</script>



@endpush