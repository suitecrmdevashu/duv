@extends('admin.layout.master', ['page_title' => 'Menu'])
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Menu </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Menu </li>
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
                                <h3 class="card-label">Menu</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Submenu</th>
                                        <th>Enable/Disable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->title }}</td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" data-id="{{ $menu->id }}" class="toggle-switch"
                                                    {{ $menu->is_active ? 'checked' : '' }}>
                                            </td>
                                        </tr>

                                        @foreach ($menu->submenus as $submenu)
                                            <tr>
                                                <td></td>
                                                <td>{{ $submenu->title }}</td>
                                                <td>
                                                    {{-- <input type="checkbox" data-id="{{ $submenu->id }}" class="toggle-switch" {{ $submenu->is_active ? 'checked' : '' }}> --}}
                                                    <input type="checkbox" class="toggle-switch"
                                                        data-id="{{ $submenu->id }}" data-toggle="toggle"
                                                        {{ $submenu->is_active ? 'checked' : '' }}>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        </div><!-- /.container-fluid -->
    @endsection


    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.toggle-switch').change(function() {
                    var menuId = $(this).data('id');
                    $.ajax({
                        url: '/admin/menus/toggle-status', // Correct route
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: menuId // send id inside data
                        },
                        success: function(response) {
                            Swal.fire({
                                text: "Menu Updated",
                                icon: 'success', // ⚡ use 'icon' instead of 'type'
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-primary"
                                }
                            }).then(function() {
                                window.location = '/admin/menus';
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
