@extends('admin.layout.master', ['page_title' => 'Product'])
@push('style')



<link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">



@endpush
{{-- @section('button')
<a href="{{ route('productCreate') }}" class="btn btn-outline-primary">Add</a>
@endsection --}}
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3>Gallery</h3>
        </div>

        <div class="card-toolbar" style="float: right">
            <a href="{{ route('productCreate') }}" class="btn btn-outline-primary">Add</a>
        </div>
        
    </div>
  
  <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Year</th>
                  
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! str_replace('-', ' ', ucwords($row->title)) !!}</td>
                    <td>
                        {!! str_replace('-', ' ', ucwords($row->category->name)) !!}
                    </td>
                    
                    <td>
                        <a href="{{ route('productEdit', $row->title ) }}"><span class="btn btn-sm btn-outline-primary">Detail</span></a>
                    </td>
                </tr>
                @endforeach
                <tbody>
        </table>
  </div>
</div>
@endsection
@push('script')
<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/mazer.js') }}"></script>
<script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endpush

@push('styles')
<style type="text/css">
  #table1 thead tr th a{
      color:white !important;
  }
  
  </style>
@endpush