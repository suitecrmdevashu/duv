@extends('admin.layout.master', ['page_title' => 'Mission & Vision'])
@push('style')
    <style>
        .ck.ck-balloon-panel.ck-powered-by-balloon .ck.ck-powered-by a {
            display: none !important;
        }
    </style>
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Mission & Vision</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Mission & Vision</li>
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

                    <form class="form" method="POST" enctype="multipart/form-data" id="create_visionMission_form">
                        @csrf

                        <input type="hidden" name="id" value="1">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Mission & Vision
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!--begin::Form-->

                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label>Mission<span class="mandatory_input">*</span></label>
                                        <textarea class="form-control" id="mission" name="mission" placeholder="Enter Mission">
                                            {{ old('mission', isset($data) ? $data->mission : '') }}
                                        </textarea>
                                        <div class="common-error form-text mission_error"></div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Vision<span class="mandatory_input">*</span></label>
                                        <textarea class="form-control" id="vision" name="vision" placeholder="Enter Vision">
                                            {{ old('vision', isset($data) ? $data->vision : '') }}
                                        </textarea>
                                        <div class="common-error form-text vision_error"></div>
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
                                        @if (isset($data) && $data->id == 1)
                                            <button type="submit" class="btn btn-warning mr-2">Update</button>
                                        @else
                                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                                        @endif
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
    <script src="{{ asset('admin/js/visionMission.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('#mission, #vision').forEach(editorElement => {
            ClassicEditor
                .create(editorElement)
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
