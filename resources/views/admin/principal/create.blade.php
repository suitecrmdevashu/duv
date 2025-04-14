@extends('admin.layout.master', ['page_title' => 'Social Media'])
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
                    <h1 class="m-0">Manage Principal Desk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Principal Desk</li>
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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <form method="POST" action="{{ route('update.principal-desk') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Principal Desk</h3>
                            </div>
                            <!-- /.card-header -->
                            <!--begin::Form-->

                            <div class="card-body">
                                <div class="form-group row">

                                <div class="col-12">
                                @if(isset($principal) && $principal->image)
                                            <img src="{{ asset( $principal->image) }}" alt="Principal Image" class="shadow-lg" style="max-width: 200px;display:block;margin:auto;">
                                        @endif
                                </div>

                                <div class="col-12">

                                  <div class="row">
                                    <div class="col-3">
                                    </div>

                                     <div class="col-6 text-center">
                                        <label for="image">Principal Image</label>
                                        <input type="file" class="form-control" name="image" id="image" class="form-control-file">     
                                     </div>

                                      <div class="col-3">
                                      </div>
                                 </div>

                                </div>

                                <div class="col-12 mt-3">
                                   <div class="row">
                                        <div class="col-lg-6">
                                        <label for="name">Principal Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $principal->name) }}" required>
                                        <div class="common-error form-text" id="year_error"></div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="message">Principal Message</label>
                                        <textarea name="message" class="form-control" id="message">{{ old('message', $principal->message) }}</textarea>
                                        <div class="common-error form-text" id="subheading_error"></div>
                                    </div>
                                   </div>
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

{{-- <script src="{{asset('admin/js/activities.js')}}"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#message' ) )
        .catch( error => {
            console.error( error );
        });
</script>

@endpush