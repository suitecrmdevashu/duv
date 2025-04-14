@extends('admin.layout.master', ['page_title' => 'Notification'])
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
            <h1 class="m-0">Manage Notification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Notification</li>
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
                    <h3 class="card-label">Notification</h3>
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
                            <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
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
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/js/festival.js')}}"></script>

@endpush