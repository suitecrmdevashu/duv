@extends('admin.layout.master', ['page_title' => 'Social Media'])


@section('content')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Social Media</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Social Media</li>
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
                    <form method="POST" action="{{ route('update.social_contact') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Social Media</h3>
                            </div>
                            <!-- /.card-header -->
                            <!--begin::Form-->

                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $socialContact->facebook) }}">
                                        <div class="common-error form-text" id="year_error"></div>
                                    </div>

                                    <div class="col-lg-4">
                                         <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" value="{{ old('twitter', $socialContact->twitter) }}">
                                        <div class="common-error form-text"id="subheading_error"></div>
                                    </div>

                                    <div class="col-lg-4">
                                         <label for="twitter">Youtube</label>
                                        <input type="text" class="form-control" name="youtube" value="{{ old('youtube', $socialContact->youtube) }}">
                                        <div class="common-error form-text"id="subheading_error"></div>
                                    </div>

                                     <div class="col-lg-4">
                                        <label for="phone">Phone<span class="mandatory_input">*</span></label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $socialContact->phone) }}">
                                        <div class="common-error form-text"id="subheading_error"></div>
                                    </div>

                                     <div class="col-lg-4">
                                          <label for="email">Email<span class="mandatory_input">*</span></label>
                                       <input type="email" class="form-control" name="email" value="{{ old('email', $socialContact->email) }}">
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
  
  
  
@endsection

@push('script')

{{-- <script src="{{asset('admin/js/activities.js')}}"></script> --}}

@endpush