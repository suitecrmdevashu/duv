@extends('admin.layout.master', ['page_title' => 'Scout & Guide'])
@push('styles')
    <link rel="stylesheet" href="{{asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush
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
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Scout & Guide</h3>
                </div>
                @if (\Auth::user()->isA('Admin'))
                <div class="card-toolbar">
                    <a href="/admin/scout-&-guide/create" class="btn btn-primary font-weight-bolder">
                        <i class="fa fa-plus-circle mr-1"></i>
                        Add Images</a>
                </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="festival_datatable" class="table table-bordered">
                  <thead class="text-center">
                  <tr>
                    <th class="text-center" width="5%">S.No</th>
                    <th>Image</th>
                    <th>Caption</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $sequenceNumber = 1; // Initialize the sequence number
                    @endphp
                    @foreach ($banners as $banner)
                    <tr>
                        <td class="text-center">{{$sequenceNumber}}</td>
                        <td class="text-center">
                          <a href="javascript:;" class="view_image" data-image="{{ asset($banner->image_path) }}">
                              <img src="{{ asset($banner->image_path) }}" alt="Banner Image" width="100">
                          </a>
                      </td>
                        <td class="text-center">{{ $banner->caption }}</td>
                        <td class="text-center">
                          <a href="javascript:;" data-id="{{ $banner->id }}" class="btn btn-sm btn-clean btn-icon delete_banner" title="Delete">
                              <i class="fas fa-trash text-danger"></i>
                          </a>
                      </td>
                    </tr>
                    @php
                    $sequenceNumber++; // Increment the sequence number
                @endphp
                   @endforeach
                  </tbody>
                </table>
                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-body">
                              <img src="" id="modalImage" alt="Full Screen Image" class="img-fluid">
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('script')
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script>
        $(document).on('click', '.delete_banner', function () {

        Swal.fire({
          title: 'Are you sure?',
          // text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            $('.pre-loader').show();

            let banner_id = $(this).attr('data-id');
              
            $.ajax({
              data: {
                'banner_id': banner_id,
                '_token': $('input[name="_token"]').val()
              },
              type: 'DELETE',
              url: '/admin/scout-&-guide/delete/'+banner_id,

              success: function (response) {
                let res = response;

                if (res.result == 'success') {

                  Swal.fire({
                    text: res.msg,
                    type: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    confirmButtonClass: "btn font-weight-bold btn-primary"
                  }).then(function () {
                    window.location.reload();
                  });
                }
                else if (res.result == 'failure') {

                  Swal.fire({
                    text: "Something went wrong. Please try again.",
                    type: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    confirmButtonClass: "btn font-weight-bold btn-light"
                  }).then(function () {
                    window.location.reload();
                  });
                }

                $('.pre-loader').hide();
              },

              error: function (error) {

              }
            });
          }
        });
        });
        $(document).ready(function() {
        $('.view_image').click(function() {
            var imagePath = $(this).data('image');
            $('#modalImage').attr('src', imagePath);
            $('#imageModal').modal('show');
        });
    });
</script>

@endpush