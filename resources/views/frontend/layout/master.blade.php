<html>
<head>
  <title>{{Config::get('app.name')}} @if(isset($page_title)) {{' | '.$page_title}} @endif</title>
  <meta charset="utf-8" />
  <link rel="icon" type="image/x-icon" href="Logo/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />

  <link rel="stylesheet" id="fontawesome-css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=5.8.1" type="text/css"
    media="all" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <link rel="stylesheet" href="{{asset('frontend/css/index.css')}}">
  <!--External CSS-->
  @stack('styles')
  
</head>
<body>
  @include('frontend.layout.header')
  @yield('content')
  
  @include('frontend.layout.footer')


@stack('script')
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('theme/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
{{-- @if(session('success'))
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
    @endif --}}
<script>
  function openSearch() {
    document.getElementById("myOverlay").style.display = "block";
  }

  function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
  }

</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
  function openNav() {
    document.getElementById("myNav").style.height = "100%";
  }

  function closeNav() {
    document.getElementById("myNav").style.height = "0%";
  }
  AOS.init();
</script>
@stack('script')
</body>
</html>