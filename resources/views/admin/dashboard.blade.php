@extends('admin.layout.master', ['page_title' => 'Dashboard'])

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                    <h3 class="card-label">Emails</h3>
                </div>
                @if (\Auth::user()->isA('Admin'))
                <div class="card-toolbar">
                    {{-- <a href="/admin/festivals/create" class="btn btn-primary font-weight-bolder">
                        <i class="fa fa-plus-circle mr-1"></i>
                        Add Holiday</a> --}}
                </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="notifications_datatable" class="table table-bordered">
                  <thead class="text-center">
                  <tr>
                    <th class="text-center" width="5%">S.No</th>
                    {{-- <th>id</th> --}}
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $contact)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            {{-- <td>{{ $contact->id }}</td> --}}
                            <td>{{ $contact->first }} {{ $contact->last }}</td>
                            <td>{{ $contact->emailto }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <!-- Add your actions or buttons here -->
                                <!-- Example: -->
                                <a href="javascript:;" data-id="{{ $contact->id }}" class="btn btn-sm btn-clean btn-icon delete_festivals" title="Delete">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
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
        </div>
    </section>
@endsection
@push('script')
<script>
    $(document).on('click', '.delete_festivals', function () {

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

        let festival_id = $(this).attr('data-id');
            
        $.ajax({
            data: {
                'festival_id': festival_id,
                '_token': $('input[name="_token"]').val()
            },
            type: 'DELETE',
            url: '/admin/email/delete/'+festival_id,

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
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
@endpush
