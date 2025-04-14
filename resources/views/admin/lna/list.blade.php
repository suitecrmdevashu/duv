@extends('admin.layout.master', ['page_title' => 'latestnews&announcements'])
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
            <h1 class="m-0">Manage Latest News & Announcements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Latest News & Announcements</li>
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
                    <h5 class="card-label">Latest News & Announcements</h5>
                </div>
                @if (\Auth::user()->isA('Admin'))
                <div class="card-toolbar">
                    <a href="/admin/latestnews&announcements/create" class="btn btn-primary font-weight-bolder">
                        <i class="fa fa-plus-circle mr-1"></i>
                        Add Latest News & Announcements</a>
                </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="lnas_datatable" class="table table-bordered">
                  <thead class="text-center">
                  <tr>
                    <th class="text-center" width="5%">S.No</th>
                    <th>Title</th>
                    <th>Image/Pdf</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $sequenceNumber = 1; 
                    @endphp
                    @foreach ($lnas as $lna)
                    <tr>
                        <td class="text-center">{{$sequenceNumber}}</td>
                        <td class="text-center">{{ $lna->caption}}</td>
                        <td class="text-center">
                          @if (Str::endsWith($lna->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img src="{{ asset($lna->file_path) }}" alt="Image" width="100">
                    @elseif (Str::endsWith($lna->file_path, '.pdf'))
                        <a href="{{ asset($lna->file_path) }}" target="_blank">View PDF</a>
                    @endif
                      </td>
                        <td class="text-center">
                          <a href="javascript:;" data-id="{{ $lna->id }}" class="btn btn-sm btn-clean btn-icon delete_lna" title="Delete">
                            <i class="fas fa-trash text-danger"></i>
                        </a>
                      </td>
                    </tr>
                    @php
                    $sequenceNumber++; 
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
        $(document).on('click', '.delete_lna', function () {

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

            let lna_id = $(this).attr('data-id');
              
            $.ajax({
              data: {
                'lna_id': lna_id,
                '_token': $('input[name="_token"]').val()
              },
              type: 'DELETE',
              url: '/admin/latestnewsannouncements/delete/'+lna_id,

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
<script>
  $(function() {
                   $("#lnas_datatable").DataTable({
                     "responsive": true,
                     "lengthChange": false,
                     "autoWidth": false,
                     // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                     "buttons": ["csv", "excel"]
                   }).buttons().container().appendTo('#lnas_datatable_wrapper .col-md-6:eq(0)');
                   $('#example2').DataTable({
                     "paging": true,
                     "lengthChange": false,
                     "searching": false,
                     "ordering": true,
                     "info": true,
                     "autoWidth": false,
                     "responsive": true,
                   });
                 });
</script>
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>


@endpush