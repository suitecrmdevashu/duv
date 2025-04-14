@extends('admin.layout.master', ['page_title' => 'Create Marquee'])


@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Marquee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Marquee</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
          <div class="row">
              <div class="col-12">
                  <form class="form" id="create_edit_marquee_form" method="POST" action="{{ isset($marquee->id) ? route('marquee.update', $marquee->id) : route('marquee.store') }}">
                      @csrf
  
                      <!-- Other form fields -->
                      <div class="form-group row">
                          <div class="col-lg-6">
                              <label>Marquee<span class="mandatory_input">*</span></label>
                              <textarea class="form-control" id="name" name="name" placeholder="Enter Marquee">{{ $marquee != '' ? $marquee->name : '' }}</textarea>
                              <div class="common-error form-text name_error"></div>
                          </div>
                          <div class="col-lg-6">
                              <label>Status <span class="mandatory_input">*</span></label>
                              <select class="form-control" id="status" name="status">
                                  <option value="">Select Status</option>
                                  <option value="1" {{ (isset($marquee->status) && $marquee->status == 1) ? 'selected' : '' }}>Active</option>
                                  <option value="0" {{ (isset($marquee->status) && $marquee->status == 0) ? 'selected' : '' }}>Inactive</option>
                              </select>
                              <div class="common-error form-text status_error"></div>
                          </div>
                      </div>
                      <!-- End of other form fields -->
  
                      <!-- Submit button and Cancel link -->
                      <div class="card-footer">
                          <div class="row">
                              <div class="col-lg-12 text-center">
                                  <button type="submit" class="btn btn-success mr-2">
                                      @if(isset($marquee->id))
                                          Update
                                      @else
                                          Submit
                                      @endif
                                  </button>
                                  {{-- <a href="{{ route('marquee.create') }}" class="btn btn-secondary">Cancel</a> --}}
                              </div>
                          </div>
                      </div>
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

@endpush