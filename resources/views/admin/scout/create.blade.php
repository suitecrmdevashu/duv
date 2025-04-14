@extends('admin.layout.master', ['page_title' => 'Add Scout & Guide'])


@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Scout & Guide</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Scout & Guide</li>
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
            
            <form class="form" method="POST" action="{{ route('scout.store') }}"  enctype="multipart/form-data" id="create_bannerimg_form">
                @csrf
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">New Scout & Guide</h3>
                  </div>
                  <!-- /.card-header -->
                  <!--begin::Form-->
                  
                    <div class="card-body">
                        <div class="form-group row">
                            
                            <div class="col-lg-4">
                                <label>Image<span class="mandatory_input">*</span></label>
                                <input type="file" class="form-control" id="image" name="image" placeholder="Festival Name">
                                <div class="common-error form-text"  id="image_error"></div>
                            </div>

                            <div class="col-lg-4">
                              <label>Caption<span class="mandatory_input">*</span></label>
                              <input type="text" class="form-control" id="caption" name="caption" placeholder="Caption">
                            
                              <div class="common-error form-text"id="caption_error"></div>
                             
                          </div>
                            
                            {{-- <div class="col-lg-4">
                                <label>Status <span class="mandatory_input">*</span></label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">Select Status</option>
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                                </select>
                                <div class="common-error form-text status_error"></div>
                           </div> --}}
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
<script>
    $(document).ready(function() {
        $('#create_bannerimg_form').submit(function(event) {
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
                            text: "Image Saved.",
                            type: 'success',
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            confirmButtonClass: "btn font-weight-bold btn-primary"
                        }).then(function() {
                            window.location = '/admin/scout-&-guide';
                        });

                        $('#create_bannerimg_form')[0].reset();
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