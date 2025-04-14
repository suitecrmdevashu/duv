<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin/css/adminlte.min.css')}}">
  
</head>
<style>
  .wrapper{
      text-align:center;
  }
</style>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-10">
            <h1>Reset Password</h1>
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
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Reset Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="{{route('reset.password')}}">
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
   <input type="hidden" name="token" value="{{$token}}">
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email : <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="email" value="{{$email ?? old('email')}}" id ="email" class="form-control"  placeholder="Enter Email" name="email">
                      <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">New Password : <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="password" id ="password" class="form-control"  placeholder="Enter New Password" name="password">
                      <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Confirm Password : <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="password" id ="password_confirmation" class="form-control"  placeholder="Enter Confirm Password" name="password_confirmation">
                      <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                    </div>
                  </div>
                 
                </div>

                <!-- /.card-body -->
                <div class="card-footer text-center mr-1">
                  <button type="submit" class="btn btn-secondary">Reset Password</button>

                 <button class="btn btn-secondary  m-3 pr-2"><a href="{{route('login')}}" style="color:white;">Log in</a></button> 
                  <!-- <button type="submit" class="btn btn-default float-right">Cancel</button> -->
               
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
