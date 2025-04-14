@extends('admin.layout.master', ['page_title' => 'TranserCertificate'])
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
            <h1 class="m-0">Manage Transer Certificate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"> Transer Certificate</li>
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
                    <h5 class="card-label"> Transer Certificate</h5>
                </div>
                @if (\Auth::user()->isA('Admin'))
                <div class="card-toolbar">
                    <a href="/admin/tc/create" class="btn btn-primary font-weight-bolder">
                        <i class="fa fa-plus-circle mr-1"></i>
                        Add  Transer Certificate</a>
                </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="tc_datatable" class="table table-bordered">
                  <thead class="text-center">
                      <tr>
                          <th class="text-center" width="5%">S.No</th>
                          <th>Enter Admission No</th>
                          <th>Year</th>
                          <th>Image/Pdf</th>
                          <th>Action</th>
                          
                          
                      </tr>
                  </thead>
                  <tbody>
                      @php
                      $sequenceNumber = 1; 
                      @endphp
                      @foreach ($tcs as $tc)
                      <tr>
                          <td class="text-center">{{$sequenceNumber}}</td>
                          <td class="text-center">{{ $tc->sequence_number }}</td>
                          <td class="text-center">{{ $tc->tcYear->year }}</td>
                          <td class="text-center">
                            @foreach ($tc->tcImages as $tcImage)
                            @if (Str::endsWith($tcImage->image_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                <img src="{{ asset($tcImage->image_path) }}" alt="Image" width="100"> 
                            @elseif (Str::endsWith($tcImage->image_path, '.pdf'))
                                <a href="{{ asset($tcImage->image_path) }}" target="_blank">View PDF</a>
                            @endif
                            <td class="text-center">
                              <a href="javascript:;" data-id="{{ $tc->id }}" class="btn btn-sm btn-clean btn-icon delete_tc" title="Delete" data-tc-image-id="{{ $tcImage->id }}" data-tc-year="{{ $tc->tcYear->year }}" data-sequence-number="{{ $tc->sequence_number }}">
                                  <i class="fas fa-trash text-danger"></i>
                              </a>                         
                            </td>
                        @endforeach
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
$(document).on('click', '.delete_tc', function () {
    let tc_id = $(this).attr('data-id');
    let tc_year = $(this).attr('data-tc-year');
    let sequence_number = $(this).attr('data-sequence-number');

    Swal.fire({
        title: 'Are you sure?',
        text: `Do you want to delete TC for Year ${tc_year} - Sequence ${sequence_number}?`,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            $('.pre-loader').show();

            $.ajax({
                data: {
                    'id': tc_id,
                    '_token': $('input[name="_token"]').val()
                },
                type: 'DELETE',
                url: '/admin/tc/delete/' + tc_id,

                success: function (response) {
                    if (response.result === 'success') {
                        Swal.fire({
                            text: response.msg,
                            type: 'success',
                            buttonsStyling: false,
                            confirmButtonText: 'Ok',
                            confirmButtonClass: 'btn font-weight-bold btn-primary'
                        }).then(function () {
                            // Reload the page or perform other actions as needed
                            window.location.reload();
                        });
                    } else if (response.result === 'failure') {
                        Swal.fire({
                            text: response.msg,
                            type: 'error',
                            buttonsStyling: false,
                            confirmButtonText: 'Ok',
                            confirmButtonClass: 'btn font-weight-bold btn-light'
                        });
                    }

                    $('.pre-loader').hide();
                },

                error: function (error) {
                    Swal.fire({
                        text: 'An error occurred. Please try again later.',
                        type: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Ok',
                        confirmButtonClass: 'btn font-weight-bold btn-light'
                    });
                    $('.pre-loader').hide();
                }
            });
        }
    });
});

</script>

<script>
  $(function() {
                   $("#tc_datatable").DataTable({
                     "responsive": true,
                     "lengthChange": false,
                     "autoWidth": false,
                     // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                     "buttons": ["csv", "excel"]
                   }).buttons().container().appendTo('#tc_datatable_wrapper .col-md-6:eq(0)');
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