<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin/css/adminlte.min.css')}}">
  
</head>

<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 ">
          <!-- <div class="col-sm-6">
            <h1>Forgot Password</h1>
          </div> -->
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8">
        
            <!-- Horizontal Form -->
            <div class="card card-secondary center">
              <div class="card-header bg-secondary text-white">
                <h3 class="card-title ">Forgot Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="{{route('reset.password.link')}}">
                @csrf
                <div class="card-body">
       

      @if(Session::get('success'))
        <div class="alert alert-success">
 
          {{Session::get('success')}}
        </div>
      @endif

      @if(Session::get('fail'))
        <div class="alert alert-danger">
  
          {{Session::get('fail')}}
        </div>
      @endif

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email : <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="email" value="{{old('email')}}" id ="email" class="form-control"  placeholder="Enter Email" name="email">
                      <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                  </div>

                 
                </div>

                <!-- /.card-body -->
                <div class="card-footer text-center mr-1">
                  <button type="submit" class="btn btn-secondary">Send Email</button>
                  <button class="btn btn-secondary  m-3 pr-2"><a href="{{route('login')}}" style="color:white;">Log in</a></button> 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</div>
<!-- ./wrapper -->

<!-- jQuery -->

</body>
</html>
