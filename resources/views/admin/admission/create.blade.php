@extends('admin.layout.master', ['page_title' => 'Admission Procedure'])
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
                    <h1 class="m-0">Manage Admission Procedure</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Admission Procedure</li>
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

                    <form class="form" method="POST" action="{{ route('admission.store') }}" enctype="multipart/form-data"
                        id="create_admission_form">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">New Admission Procedure</h3>
                            </div>
                            <!-- /.card-header -->
                            <!--begin::Form-->

                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                        <div class="common-error form-text"id="title_error" placeholder="Title" ></div>
                                    </div>

                                    {{-- <div class="col-lg-6">
                                        <label>Content</label>
                                        <textarea class="form-control" name="content" id="content" required></textarea>
                                        <div class="common-error form-text" id="content_error"></div>
                                    </div> --}}

                                    <div class="col-lg-6">
                                        <label>Content<span class="mandatory_input">*</span></label>
                                        <textarea class="form-control" id="activity" name="activity" placeholder="Activity Name"></textarea>
                                        <div class="common-error form-text activity_error"></div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#activity' ) )
        .catch( error => {
            console.error( error );
        });
</script>
@endpush
