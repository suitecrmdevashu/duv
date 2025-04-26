@extends('admin.layout.master', ['page_title' => 'Add Sports'])
@push('styles')
    <link rel="stylesheet" href="{{ asset('theme/plugins/dropzone/dropzone.css') }}">
    <style type="text/css">
        .dz-preview .dz-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }

        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
            min-height: 150px;
            padding: 20px;
        }
    </style>
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Sports</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sports</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Sports Images</h3>
                        </div>
                        <form method="POST" action="{{ route('sports.store') }}" id="create_sports_form" class="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <!-- Other form fields here -->

                                <!-- Dropzone container -->
                                <div class="form-group">
                                    <label>Upload Images</label>
                                    <div class="dropzone" id="myDropzone">
                                        <div class="dz-message" data-dz-message>
                                            <span>Drop files here or click to upload</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-success mr-2">Upload</button>
                                        <button type="reset" class="btn btn-secondary"
                                            onclick="history.back();">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('theme/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script type="text/javascript">
        // Initialize Dropzone
        Dropzone.autoDiscover = false;

        $(document).ready(function() {
            let myDropzone = new Dropzone("#myDropzone", {
                url: "{{ route('sports.store') }}",
                paramName: "image", // Name for the uploaded file
                maxFilesize: 5, // MB
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                autoProcessQueue: false,
                uploadMultiple: false, // Important: false
                parallelUploads: 5, // How many uploads happen in parallel
                maxFiles: 10,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function() {
                    let submitButton = document.querySelector(
                    "#create_sports_form button[type=submit]");
                    let myDropzone = this;

                    // On Submit button click
                    submitButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (myDropzone.getQueuedFiles().length > 0) {
                            myDropzone.processQueue(); // Upload files
                        } else {
                            document.getElementById("create_sports_form")
                        .submit(); // Submit normally if no file
                        }
                    });

                    // When sending each file
                    this.on("sending", function(file, xhr, formData) {
                        let form = $('#create_sports_form').serializeArray();
                        $.each(form, function(key, el) {
                            formData.append(el.name, el.value);
                        });
                    });

                    // When all files uploaded successfully
                    this.on("queuecomplete", function() {
                        Swal.fire("Uploaded!", "All images uploaded successfully.", "success")
                            .then(function() {
                                window.location.href =
                                "{{ route('sports.list') }}"; // Redirect
                            });
                        $(".pre-loader").hide(); // Hide loader if you have any
                    });

                    // If any error during upload
                    this.on("error", function(file, errorMessage) {
                        Swal.fire("Error!", "Something went wrong.", "error");
                        $(".pre-loader").hide();
                    });

                    // Remove preview if file removed
                    this.on("removedfile", function(file) {
                        if (file.previewElement != null) {
                            file.previewElement.parentNode.removeChild(file.previewElement);
                        }
                    });
                }
            });
        });
    </script>
@endpush
