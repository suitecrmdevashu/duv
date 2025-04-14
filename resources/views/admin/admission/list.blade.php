@extends('admin.layout.master', ['page_title' => 'Admission Procedure'])
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
            <h1 class="m-0">Manage Admission Procedure</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
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
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                    <h4 class="card-label">Admission Procedure</h4>
                </div>
                @if (\Auth::user()->isA('Admin'))
                <div class="card-toolbar">
                    <a href="/admin/admission/create" class="btn btn-primary font-weight-bolder">
                        <i class="fa fa-plus-circle mr-1"></i>
                        Add Class</a>
                </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
               @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table id="gallery_datatable" class="table table-bordered">
                  <thead class="text-center">
                  <tr>
                    <th class="text-center" width="5%">S.No</th>
                    {{-- <th>Year</th> --}}
                    <th>Class</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                <tbody>
                    @php
                    $sequenceNumber = 1;
                    @endphp
                   @foreach ($admissions as $admission)

                    <tr>
                        <td class="text-center">{{$sequenceNumber}}</td>
                        {{-- <td class="text-center">{{ $subtopic->year->year_name }}</td> --}}
                        <td class="text-center">{{ $admission->title }}</td>
                        <td class="text-center">
                          <a href="{{ route('admission.edit', ['id' => $admission->id]) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="javascript:;" data-id="{{ $admission->id }}" class="btn btn-sm btn-clean btn-icon delete_banner" title="Delete">
                          <i class="fas fa-trash text-danger"></i>
                      </a>
                    </tr>
                    @php
                    $sequenceNumber++;
                @endphp
                   @endforeach
                  </tbody>
                </table>
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
      url: '/admin/admission/delete/'+banner_id,

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
</script>
<script>
  $(function() {
                   $("#gallery_datatable").DataTable({
                     "responsive": true,
                     "lengthChange": false,
                     "autoWidth": false,
                     // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                     "buttons": ["csv", "excel"]
                   }).buttons().container().appendTo('#gallery_datatable_wrapper .col-md-6:eq(0)');
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