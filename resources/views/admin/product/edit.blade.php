@extends('admin.layout.master', ['page_title' => 'Gallery-Edit'])
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select-live/dselect.scss') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}">
    <style>
       .product-image-item {
    position: relative;
    width: 100%;
    max-width: 100px;
    height: 100px;
    border-radius: 8px;
    overflow: hidden;
    margin: 5px auto;
    border: 1px solid #ddd;
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
}

.product-image-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.product-image-item .delete-image-product {
    position: absolute;
    top: 4px;
    right: 4px;
    z-index: 10;
    padding: 3px 6px;
    font-size: 12px;
    background-color: rgba(220, 53, 69, 0.9); /* Bootstrap red */
    color: #fff;
    border: none;
    border-radius: 4px;
}

.product-images {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

        .form-select {
            text-align: left !important;
        }

        .dropzone {
            min-height: 150px;
            border: 2px solid rgba(0, 0, 0, 0.3);
            background: white;
            padding: 20px 20px;
        }
    </style>
@endpush
@section('content')
    <div class="card">
        <div class="card-body row">
            <div class="col-md-6 col-12">
                <form action="{{ route('productEditSave', ['product' => $product->title, 'id' => $product->id]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control  @error('title') is-invalid @enderror" placeholder="Chicken nugget spicy"
                            value="{{ old('title') ? old('title') : $product->title }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Year</label>
                        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror"
                            required>
                            <option selected disabled>Select Category</option>
                            @foreach (\App\Models\Category::all() as $item)
                                <option value="{{ $item->id }}"
                                    {{ $product->category->id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" cols="30" class="form-control autosize @error('desc') is-invalid @enderror"
                            placeholder="Enter Description">{{ $product->desc }}</textarea>
                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Save</button>
                </form>
            </div>
            <div class="col-md-6 col-12">
                <form method="post" action="{{ route('productAddImagesSave') }}" enctype="multipart/form-data"
                    class="dropzone mt-4" id="dropzone"
                    style="border-radius: 12px; min-height: 150px; border: 2px solid rgba(0,0,0,0.3); background: white; padding: 20px 20px;">
                    <input type="hidden" name="id_product" value="{{ $product->id }}">
                    <div class="dz-message" data-dz-message>
                        <span>Upload Gallery Images</span><br>
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.75 12.25H19.25V19.25H12.25V22.75H19.25V29.75H22.75V22.75H29.75V19.25H22.75V12.25ZM21 3.5C11.34 3.5 3.5 11.34 3.5 21C3.5 30.66 11.34 38.5 21 38.5C30.66 38.5 38.5 30.66 38.5 21C38.5 11.34 30.66 3.5 21 3.5ZM21 35C13.2825 35 7 28.7175 7 21C7 13.2825 13.2825 7 21 7C28.7175 7 35 13.2825 35 21C35 28.7175 28.7175 35 21 35Z"
                                fill="black" fill-opacity="0.3" />
                        </svg>
                    </div>
                    @csrf
                </form>
                <div class="row mt-3 product-images">
                </div>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <a href="javascript:void(0)" onClick="deleteProduct('{{ route('productDelete', $product->id) }}')"
                class="btn btn-danger float-end">Delete</a>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/vendors/select-live/dselect.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendors/select-live/dselect.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/mazer.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>
    <script>
        autosize();

        function autosize() {
            var text = $('.autosize');

            text.each(function() {
                $(this).attr('rows', 1);
                resize($(this));
                this.style.overflow = 'hidden';
            });

            text.on('input', function() {
                resize($(this));
            });

            function resize($text) {
                $text.css('height', 'auto');
                $text.css('height', $text[0].scrollHeight + 'px');
            }
        }

        var select_box_element = document.querySelector('#category')
        dselect(select_box_element, {
            search: true
        });

        document.getElementById('desc').addEventListener('keyup', function() {
            this.style.overflow = 'hidden';
            this.style.height = 0;
            this.style.height = this.scrollHeight + 'px';
        }, false);

        // const title = document.getElementById("title");
        // title.addEventListener('keyup', function(e){
        //     let result = title.value.replace(/\s+/g, "-");
        //     let capital = title.value.replace(/[A-Z]/g, "$&");
        //     title.value = result.toLowerCase()
        // });

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
                        if (title == '{{ $product->title }}') {
                            $('#title').removeClass('is-invalid');
                            $('#title').addClass('is-valid');
                        } else if (data.code == 200) {
                            $('#title').addClass('is-invalid');
                            $('#title').removeClass('is-valid');
                        } else if (data.code == 201) {
                            $('#title').removeClass('is-invalid');
                            $('#title').addClass('is-valid');
                        }
                    },
                })
            }, 100);

        })

        function allDataImages() {
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_products: '{{ $product->id }}'
                },
                url: '{{ route('productGetImages') }}',
                success: function(response) {
                    let data = "";
                    $.each(response, function(key, value) {
                        data += '<div class="col-lg-3 col-md-3 col-md-3 col-12">'
                        data += '<div class="product-image-item mb-4" style="position: relative;">'
                        data +=
                            '<button class="btn btn-danger btn-sm delete-image-product" style="position:absolute;top:5px;right:5px;z-index:9;" onclick="alertconfirm(\'' +
                            value.path.replace(/'/g, "\\'") + '\')">'
                        data += '<i class="bi bi-trash"></i></button>'
                        data += '<img src="{{ asset('shop/products') }}/' + value.path +
                            '" style="width: 100%; height: 100px; object-fit: cover;">'
                        data += '</div>'
                        data += '</div>'
                    })
                    $('.product-images').html(data);
                }
            })
        }



        allDataImages();

        Dropzone.options.dropzone = {
            accept: function(file, done) {
                done();
            },
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    document.getElementById('alerts').classList.add('show');
                    this.removeFile(file);
                });
            },
            renameFile: function(file) {
                function getFileExtension(filename) {
                    const extension = filename.split('.').pop();
                    return extension;
                }
                const result1 = getFileExtension(file.name);
                var dt = new Date();
                var time = dt.getTime();
                return time + '.' + result1;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.doc,.docx",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) {
                var name = file.upload.filename;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ route('productDeleteImages') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        filename: name
                    },
                    success: function(data) {
                        allDataImages();
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function(file, response) {
                allDataImages();
            },
            error: function(file, response) {
                return false;
            }
        };

        const alertconfirm = (path) => {
            Swal.fire({
                title: 'Sure to delete this image?',
                text: "This image will delete permanently",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ route('productDeleteImages') }}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            filename: path
                        },
                        success: function(data) {
                            allDataImages();
                            Toastify({
                                text: "Image deleted",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                        },
                        error: function(e) {
                            console.log(e);
                        }
                    });
                }
            })
        }

        const deleteProduct = (url) => {
            Swal.fire({
                title: 'Sure to delete this product?',
                text: "This product will delete permanently",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace(url);
                }
            })
        }
    </script>
@endpush
