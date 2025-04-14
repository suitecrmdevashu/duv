@extends('admin.layout.master', ['page_title' => 'Add Banner Images'])


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

                    <form class="form" method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data"
                        id="create_gallery_form">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">New Gallery Images</h3>
                            </div>
                            <!-- /.card-header -->
                            <!--begin::Form-->

                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <label>Select Year<span class="mandatory_input">*</span></label>
                                        <select class="custom-select" name="year" id="year">
                                            @foreach ($years as $year)
                                                <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="common-error form-text" id="year_error"></div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Subheading</label>
                                        <input type="text" class="form-control" name="subheading" id="subheading">
                                        <div class="common-error form-text"id="subheading_error"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form-->
                            <!-- /.card-body -->
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
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#create_gallery_form').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var res = response;
                        if (res.result == 'success') {
                            Swal.fire({
                                text: "Gallery Image Saved.",
                                type: 'success',
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                confirmButtonClass: "btn font-weight-bold btn-primary"
                            }).then(function() {
                                window.location = '/admin/gallery';
                            });

                            $('#create_gallery_form')[0].reset();
                        }
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        if (errors) {
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    var errorMessages = errors[key].join('<br>');
                                    $('#' + key + '_error').html(errorMessages);
                                }
                            }
                        }
                    }
                });
            });
        });
    </script>
@endpush
