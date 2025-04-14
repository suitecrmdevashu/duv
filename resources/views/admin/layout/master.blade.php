<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{Config::get('app.name')}} @if(isset($page_title)) {{' | '.$page_title}} @endif</title>
  <meta name="description" content="Document Management" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <!-- Theme select2-->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
{{-- ashu --}}
{{-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}"> --}}
{{-- endashu --}}
    @stack('styles')
    <link rel="stylesheet" href="{{asset('theme/dist/css/adminlte.min.css')}}">
    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
      .mandatory_input{
        color: red;
      }
      .select2-selection__choice{
        color: black !important;
        
      }
    </style>
  <link rel="stylesheet" href="{{asset('theme/plugins/select2/css/select2.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @csrf
      <div class="pre-loader" style="display: block;"></div>
      <!-- Preloader -->
      <!--<div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('theme/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
      </div>-->

      <!-- Navbar -->
      @include('admin.layout.header')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      @include('admin.layout.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      @include('admin.layout.footer')
    </div>
<!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('theme/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <!--<script src="{{asset('theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>-->
   
    <!-- overlayScrollbars -->
    <script src="{{asset('theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
    <script src="{{asset('theme/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <!-- <script src="{{asset('theme/plugins/jquery-validation/additional-methods.min.js')}}"></script> --->
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/mazer.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>
    @yield('js')
    @if(session('success'))
        <script>
            Toastify({
                text: "{{session('success')}}",
                duration: 3000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
        </script>
    @endif

    @if(session('failed'))
        <script>
            Toastify({
                text: "{{session('failed')}}",
                duration: 3000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#f3616d",
            }).showToast();
        </script>
    @endif
    <!-- AdminLTE App -->
    <script src="{{asset('theme/dist/js/adminlte.js')}}"></script>
    @stack('script')
    <script type="text/javascript">
      $(document).ready(function() {
        $('.pre-loader').hide();
      });
    </script>
    {{-- pushpendra --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

<script>
  let mybutton = document.getElementById("btn-back-to-top");

  
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>
</html>