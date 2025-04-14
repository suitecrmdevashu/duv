@extends('admin.layout.master', ['page_title' => 'Holidays'])
@push('styles')
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Holidays</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Holidays</li>
                    </ol>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
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
                                <h3 class="card-label">Holidays</h3>

                            </div>
                            @if (\Auth::user()->isA('Admin'))
                                <div class="card-toolbar">
                                    <a href="/admin/festivals/create" class="btn btn-primary font-weight-bolder">
                                        <i class="fa fa-plus-circle mr-1"></i>
                                        Add Holiday</a>
                                </div>
                            @endif
                            <div class="card-toolbar" style="margin-right:10px;">
                                <button type="button" class="btn btn-primary font-weight-bolder" data-toggle="modal"
                                    data-target="#yearModal">
                                    <i class="fa fa-plus-circle mr-1"></i>
                                    Select Year
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- The Modal -->
                        <div class="modal fade" id="yearModal" tabindex="-1" role="dialog"
                            aria-labelledby="yearModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="yearModalLabel">Select Year</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('create_year') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="yearSelect">Year</label>
                                                <select class="form-control" id="yearSelect" name="year">
                                                    <option value="">Select Year</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->year_name }}">{{ $year->year_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive">
                            <table id="festival_datatable" class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center" width="5%">S.No</th>
                                        <th>id</th>
                                        <th>Holidays</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
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
    <script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/js/festival.js') }}"></script>
@endpush
