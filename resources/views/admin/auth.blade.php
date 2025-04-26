@extends('admin.layout.pre_login_master', ['page_title' => 'Authenticate'])

@section('content')

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
  @endif

  @if(session('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('fail') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
  @endif

  <form id="login_form" class="form" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="input-group mb-3">
      <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" required>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    <div class="common-error email_error"></div>

    <div class="input-group mb-3">
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="common-error password_error"></div>

    <div class="row mb-3">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">
            Remember Me
          </label>
        </div>
      </div>
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block login_btn">Sign In</button>
      </div>
    </div>

  </form>

@endsection

@push('script')
    <script src="{{ asset('admin/js/auth.js') }}"></script>
@endpush
