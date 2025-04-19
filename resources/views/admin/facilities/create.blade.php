@extends('admin.layout.master', ['page_title' => 'Create Facilities'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('theme/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Facilities</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Facilities</li>
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

                    <form class="form" id="create_facilities_form" enctype='multipart/form-data'>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">New Facility Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!--begin::Form-->

                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Name<span class="mandatory_input">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Short Name">
                                        <div class="common-error form-text name_error"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Short Description<span class="mandatory_input">*</span></label>
                                        <textarea class="form-control" name="content" id="content" placeholder="Short Description"></textarea>
                                        <div class="common-error form-text content_error"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Image<span class="mandatory_input">*</span></label>
                                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                        <div class="common-error form-text photo_error"></div>
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
    <script src="{{ asset('theme/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/js/facilities.js') }}"></script>
@endpush
