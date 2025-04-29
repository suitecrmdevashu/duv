@extends('admin.layout.master', ['page_title' => 'Gallery-Create'])
@push('styles')
    <link rel="stylesheet" href="{{ asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}">
    <style>
        <style>.form-select {
            text-align: left !important;
        }

        .dropdown-menu {
            border: 1px solid #dce7f1;
        }
    </style>
@endpush
@section('content')
    <div class="card">
        <div class="card-body row">
            <div class="col-md-8 col-12">
                <form action="{{ route('producSave') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control  @error('title') is-invalid @enderror" placeholder="Add Title"
                            value="{{ old('title') }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Select year</label>
                        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror"
                            required>
                            <option selected disabled>Select Year</option>
                            @foreach (\App\Models\Category::all() as $item)
                                <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/vendors/select-live/dselect.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/mazer.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>
    <script>
        var select_box_element = document.querySelector('#category')
        dselect(select_box_element, {
            search: true
        });

        document.getElementById('desc').addEventListener('keyup', function() {
            this.style.overflow = 'hidden';
            this.style.height = 0;
            this.style.height = this.scrollHeight + 'px';
        }, false);

        const title = document.getElementById("title");
        title.addEventListener('keyup', function(e) {
            let result = title.value.replace(/\s+/g, "-");
            let capital = title.value.replace(/[A-Z]/g, "$&");
            title.value = result.toLowerCase()
        });

        $('#title').keyup(function() {
            let title = this.value

            setTimeout(() => {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        title: title
                    },
                    url: '{{ route('productCheck') }}',
                    success: function(data) {

                    },
                    statusCode: {
                        200: () => {
                            $('#title').addClass('is-invalid');
                            $('#title').removeClass('is-valid');
                        },
                        201: () => {
                            $('#title').removeClass('is-invalid');
                            $('#title').addClass('is-valid');
                        }
                    }
                })
            }, 100);

        })
    </script>
@endpush
