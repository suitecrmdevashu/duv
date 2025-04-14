@extends('admin.layout.master', ['page_title' => 'Edit Gallery Images'])
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Gallery Images</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Gallery Images</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <form id="galleryForm" action="{{ route('gallery.update', ['id' => $subtopic->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Keep this line for the PUT request -->
                        <input type="hidden" name="year_id" value="{{ $subtopic->year_id }}">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Gallery</h3>
                            </div>
                            <!-- /.card-header -->
                            <!--begin::Form-->

                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label>Select Year<span class="mandatory_input">*</span></label>
                                        <select class="custom-select" name="year" id="year">
                                            @foreach ($years as $year)
                                                <option value="{{ $year->id }}"
                                                    {{ $year->id === $subtopic->year_id ? 'selected' : '' }}>
                                                    {{ $year->year_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="common-error form-text" id="year_error"></div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Subheading</label>
                                        <input type="text" class="form-control" name="subheading" id="subheading"
                                            value="{{ $subtopic->subtopic_name }}">
                                        <div class="common-error form-text"id="subheading_error"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dropzone for Drag & Drop File Upload -->
                            <div class="container area mb-4">
                                <input type="file" class="form-control" name="image[]" id="image" multiple>
                            </div>

                            <div class="container mb-2">
                              
                                    {{-- <button id="refreshGallery" class="btn btn-secondary mr-4">Refresh Gallery</button> --}}
                                
                                    <!-- Button for Deleting Selected Images -->
                                   




                                <!--end::Form-->
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="card">

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                                        <button type="reset" class="btn btn-secondary"
                                            onclick="history.back();">Cancel</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </form>
                    <div class="row">
                        @foreach ($subtopic->images as $image)
                            <div class="col-md-4 mb-4">
                                <div class="card gallery-card">
                                    <img src="{{ asset($image->image_path) }}" class="card-img-top" alt="Image">
                                    <a href="javascript:;" class="btn btn-danger delete-image" data-image-id="{{ $image->id }}">Delete</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                  
                  {{-- <button id="deleteImagesButton" class="btn btn-danger">Delete Selected Images</button> --}}
                    {{-- <div class="image_upload_div">
                      <form action="{{ route('gallery.upload', ['id' => $subtopic->id]) }}" method="post" class="dropzone" id="my-awesome-dropzone">
                        @csrf
                        <input type="hidden" name="year_id" value="{{ $subtopic->id }}">
                      </form>
                    </div> --}}

                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@push('script')
  
    {{-- <script type="text/javascript" src="framework/js/dropzone.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#image').change(function() {
                var formData = new FormData($('#galleryForm')[0]);
                $.ajax({
                    url: '{{ route('gallery.update', ['id' => $subtopic->id]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.result === 'success') {
                            Swal.fire({
                                text: "Images Uploaded Successfully",
                                type: 'success',
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                confirmButtonClass: "btn font-weight-bold btn-primary"
                            }).then(function() {
                                // Redirect to a specific URL or do any other action
                                location.reload();
                            });

                            $('#galleryForm')[0].reset(); // Reset the form
                        }
                    },
                    error: function(xhr) {
                        // Handle error
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
   <script>
// $(document).ready(function() {
//     // Listen for delete button click events
//     $('.delete-image').on('click', function(e) {
//         e.preventDefault();

//         var imageId = $(this).data('image-id');

//         // Send a DELETE request to the server with the image ID to delete
//         $.ajax({
//             url: '/admin/gallery/delete/' + imageId,
//             type: 'DELETE',
//             data: {
//                 _token: '{{ csrf_token() }}', // Include the CSRF token
//             },
//             success: function(response) {
//                 if (response.result === 'success') {
//                     // Handle success, e.g., remove deleted image from the UI
//                     console.log('Image deleted successfully.');
//                     // Optionally, you can remove the deleted image from the UI
//                     $(e.target).closest('.col-md-4').remove();
//                 } else {
//                     console.error('Error deleting image:', response.msg);
//                 }
//             },
//             error: function(xhr, status, error) {
//                 console.error('Error:', error);
//             }
//         });
//     });
// });
$(document).ready(function() {
    // Listen for delete button click events
    $('.delete-image').on('click', function(e) {
        e.preventDefault();

        var imageId = $(this).data('image-id');

        // Show confirmation dialog using SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            // text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            // If the user clicks "Yes" in the confirmation dialog
            if (result.value) {
                // Send a DELETE request to the server with the image ID to delete
                $.ajax({
                    url: '/admin/gallery/delete/' + imageId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}', // Include the CSRF token
                    },
                    success: function(response) {
                        if (response.result === 'success') {
                            // Handle success using SweetAlert
                            Swal.fire({
                                text: response.msg,
                                type: 'success',
                                buttonsStyling: false,
                                confirmButtonText: 'Ok',
                                confirmButtonClass: 'btn font-weight-bold btn-primary'
                            }).then(function () {
                                window.location.reload();
                            });
                        } else if (response.result === 'failure') {
                            // Handle failure using SweetAlert
                            Swal.fire({
                                text: 'Something went wrong. ' + response.msg,
                                type: 'error',
                                buttonsStyling: false,
                                confirmButtonText: 'Ok',
                                confirmButtonClass: 'btn font-weight-bold btn-light'
                            }).then(function () {
                                window.location.reload();
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    });
});

</script>
@endpush
