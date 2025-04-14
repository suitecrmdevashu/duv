@extends('admin.layout.pre_login_master', ['page_title' => 'Authenticate'])

@section('content')
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
	
	<form class="form" id="login_form">
		@csrf
        <div class="input-group mb-4">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <div class="common-error form-text email_error"></div>
        </div>
        <div class="input-group mb-4">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="common-error form-text password_error"></div>
          {{-- <p>
        <a href="{{route('forgot.password')}}">Forgot Password</a>
      </p> --}}
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
             
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block login_btn">Sign In</button>
          </div>
      
          <!-- /.col -->
        </div>
        
      </form>
@endsection

@push('script')
<script src="{{asset('admin/js/auth.js')}}"></script>
@endpush