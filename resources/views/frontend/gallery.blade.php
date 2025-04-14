@extends('frontend.layout.master', ['page_title' => 'Gallery'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light mb-5">
    <div class="container about-section">
        <h2 class="pt-4 font-weight-bold">Gallery</h2>
        @foreach ($years as $year)
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="year{{ $year['category_id'] }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseYear{{ $year['category_id'] }}" aria-expanded="true" aria-controls="collapseYear{{ $year['category_id'] }}">
                                {{ $year['category_name'] }}
                            </button>
                        </h2>
                    </div>

                    <div id="collapseYear{{ $year['category_id'] }}" class="collapse" aria-labelledby="year{{ $year['category_id'] }}" data-parent=".accordion">
                        <div class="card-body">
                            @php
                                $productsCollection = collect($year['products']);
                            @endphp

                            @foreach ($productsCollection->groupBy('product_id') as $productId => $products)
                                <div class="mb-3">
                                    <h4 class="text-center text-danger">{{ $products[0]['product_title'] }}</h4>
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 alert mr-5" style="text-align: justify">
                                                <div class="gallery-card card">
                                                    <a href="javascript:;" class="view_image" data-image="{{ asset('shop/products/' . $product['image_path']) }}">
                                                        <img src="{{ asset('shop/products/' . $product['image_path']) }}" class="card-img-top" alt="Image 1">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




         

          
          <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="" id="modalImage" alt="Full Screen Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@push('script')
<script>
$(document).ready(function() {
    $('.view_image').click(function() {
        var imagePath = $(this).data('image');
        $('#modalImage').attr('src', imagePath);
        $('#imageModal').modal('show');
    });
});
</script>
    
@endpush