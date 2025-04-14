@extends('admin.layout.master', ['page_title' => 'Create Festival'])
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
            <h1 class="m-0">Manage Activity</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Activity</li>
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
            
            <form class="form" id="create_activites_form">
                @csrf
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">New Activity Details</h3>
                  </div>
                  <!-- /.card-header -->
                  <!--begin::Form-->
                  
                    <div class="card-body">
                        <div class="form-group row">
                            
                            <div class="col-lg-6">
                                <label>Celebration<span class="mandatory_input">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Celebration Name">
                                <div class="common-error form-text name_error"></div>
                            </div>

                            <div class="col-lg-6">
                              <label>Date <span class="mandatory_input">*</span></label>
                              <input type="date" class="form-control" id="date" name="date" placeholder="">
                              <div class="common-error form-text name_error"></div>
                          </div>

                          <div class="col-lg-6">
                            <label>Activity<span class="mandatory_input">*</span></label>
                            <textarea class="form-control" id="activity" name="activity" placeholder="Activity Name"></textarea>
                            <div class="common-error form-text name_error"></div>
                        </div>                        
                            
                            <div class="col-lg-6">
                                <label>Status <span class="mandatory_input">*</span></label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">Select Status</option>
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                                </select>
                                <div class="common-error form-text status_error"></div>
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
                              <button type="reset" class="btn btn-secondary" onclick="history.back();">Cancel</button>
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
<script src="{{asset('admin/js/activities.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#activity' ) )
        .catch( error => {
            console.error( error );
        });
</script>


@endpush