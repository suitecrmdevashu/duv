<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
       {{-- <li class="">
          <div onload="display_c5();" ><span id="datetime" ></span></div> 
      </li>  --}}
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
  <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
           <span class="brand-text font-weight-bold text-danger">{{\Auth::user()->name ?? Admin}} <i class="far fa-user"></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          {{-- <a href="{{ route('notifications') }}" class="dropdown-item"> --}}
          <i class="fas fa-hourglass mr-2"></i>Email
          </a>

          <div class="dropdown-divider"></div>
          <a href="/admin/logout" class="dropdown-item">
            <i class="fa fa-power-off mr-2"></i> Logout
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <script type="text/javascript">

  // function display_cts(){
   

  //    var dateObj = new Date();
  //    var ampm = dateObj.getHours() >= 12 ? 'PM' : 'AM';
  //    var month = dateObj.getUTCMonth() + 1; //months from 1-12
  //    var day = dateObj.getUTCDate();
  //    var year = dateObj.getUTCFullYear();

  //   newdate = day + "-" + month + "-" + year;
  //   newdate = newdate + " -  " + dateObj.getHours()+ ":" + dateObj.getMinutes() + ":" + dateObj.getSeconds() + ":" + ampm;
     
  //    document.getElementById('datetime').innerHTML = newdate;
    
  //   }

  // function display_c5(){

  //  var refresh = 1000;
  //  mytime = setInterval('display_cts()',refresh)
  // }

  // display_c5()
 
   </script>