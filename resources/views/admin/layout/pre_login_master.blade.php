<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ Config::get('app.name') }}@isset($page_title)
        | {{ $page_title }}
    @endisset
</title>

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback"
    rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<!-- icheck bootstrap -->
<link href="{{ asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
<!-- Theme style -->
<link href="{{ asset('theme/dist/css/adminlte.min.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
<link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" type="text/css" />

<style>
    .login-box {
        width: 420px;
        margin: 5% auto;
        animation: fadeIn 1s ease-in-out;
    }

    .login-logo img {
        max-width: 200px;
        margin-bottom: 20px;
    }

    .common-error {
        color: #e3342f;
        font-size: 0.875em;
        margin-top: 5px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert {
        padding: 8px 15px;
        font-size: 0.9rem;
    }
</style>
</head>

<body class="hold-transition login-page">

<div class="pre-loader" style="display: block;"></div>

<div class="login-box">
    <div class="card shadow-lg rounded">
        <div class="card-body login-card-body">

            <div class="login-logo text-center">
                <img src="{{ asset('/images/DUVLOGO.png') }}" alt="Logo" class="img-fluid">
            </div>

            @yield('content')

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('theme/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('theme/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('theme/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
<script src="{{ asset('theme/dist/js/adminlte.min.js') }}"></script>

@stack('script')

<script type="text/javascript">
    $(document).ready(function() {
        $('.pre-loader').fadeOut();
    });
</script>

</body>

</html>
