<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="/admin/dashboard" class="brand-link"><span class="brand-text font-weight-bold text-center"><h3>ADMIN</h3></span>
     
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('theme/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>-->
        <!-- SidebarSearch Form -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- @can('dashboard') --}}
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link @if (Session::get('active') == 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- @endcan --}}
                <li class="nav-item @if (Session::get('active') == 'festivals' ||
                        Session::get('active') == 'calender' ||
                        Session::get('active') == 'circles' ||
                        Session::get('active') == 'department' ||
                        Session::get('active') == 'vendors' ||
                        Session::get('active') == 'assets' ||
                        Session::get('active') == 'activites') menu-is-opening menu-open @endif">
                    <a href="#"
                        class="nav-link @if (Session::get('active') == 'festivals' ||
                                Session::get('active') == 'calender' ||
                                Session::get('active') == 'circles' ||
                                Session::get('active') == 'department' ||
                                Session::get('active') == 'vendors' ||
                                Session::get('active') == 'assets' ||
                                Session::get('active') == 'brand') menu-is-opening menu-open @endif">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Session Info
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('create_activites')
                            <li class="nav-item">
                                <a href="/admin/activites" class="nav-link @if (Session::get('active') == 'activites') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Activites
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('create_festivals')
                            <li class="nav-item">
                                <a href="/admin/festivals" class="nav-link @if (Session::get('active') == 'festivals') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Festival
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('index')
                            <li class="nav-item">
                                <a href="/admin/fullcalender"
                                    class="nav-link @if (Session::get('active') == 'calender') active @endif" target="_blank">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Calender
                                    </p>
                                </a>
                            </li>
                        @endcan
                        <!-- </ul> -->
                </li>
            </ul>
            </li>




            <li class="nav-item @if (Session::get('active') == 'marquee' || Session::get('active') == 'banner' || Session::get('active') == 'facility' ) menu-is-opening menu-open @endif">
                <a href="#" class="nav-link @if (Session::get('active') == 'marquee' || Session::get('active') == 'facility' || Session::get('active') == 'banner') menu-is-opening menu-open @endif">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Home Page
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('create_marquee')
                        <li class="nav-item">
                            <a href="/admin/marquee/create/1"
                                class="nav-link @if (Session::get('active') == 'marquee') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Marquee
                                </p>
                            </a>
                        </li>
                    @endcan

                    @can('create_banner')
                        <li class="nav-item">
                            <a href="/admin/banner" class="nav-link @if (Session::get('active') == 'banner') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Banner Images
                                </p>
                            </a>
                        </li>
                    @endcan

                    @can('create_facilities')
                        <li class="nav-item">
                            <a href="/admin/facilities" class="nav-link @if (Session::get('active') == 'facility') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                  Facilities
                                </p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>



            <li class="nav-item">
                <a href="/admin/admission" class="nav-link @if (Session::get('active') == 'admission') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Admission Procedure
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/achievers" class="nav-link @if (Session::get('active') == 'achievers') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Achievers Section
                    </p>
                </a>
            </li>

            {{-- <li class="nav-item">
            <a href="/admin/marquee/create/1" class="nav-link @if (Session::get('active') == 'marquee') active @endif">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Marquee 
              </p>
            </a>
          </li> --}}

            <li class="nav-item">
                <a href="/admin/social-contact" class="nav-link @if (Session::get('active') == 'socialmedia') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Social Media Links
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/syllabus" class="nav-link @if (Session::get('active') == 'syllabus') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Syllabus
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/fee-structure" class="nav-link @if (Session::get('active') == 'fee-structure') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Fee Structure
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/principal-desk" class="nav-link @if (Session::get('active') == 'principal') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Principal Desk
                    </p>
                </a>
            </li>



            <li class="nav-item">
                <a href="/admin/mpd" class="nav-link @if (Session::get('active') == 'mpd') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        MPD
                    </p>
                </a>
            </li>

            {{-- @can('create_itemissue') --}}
            {{-- <li class="nav-item">
            <a href="/admin/category" class="nav-link @if (Session::get('active') == 'category') active @endif">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Category
              </p>
            </a>
          </li> --}}

            <li class="nav-item">
                <a href="/admin/products" class="nav-link @if (Session::get('active') == 'product') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Gallery
                    </p>
                </a>
            </li>

            {{-- @endcan --}}
            {{-- @can('create_itemreturn') --}}
            <li class="nav-item">
                <a href="/admin/latestnews&announcements"
                    class="nav-link @if (Session::get('active') == 'lna') active @endif">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Latest News & Announcements
                    </p>
                </a>
            </li>
            {{-- @endcan --}}

            {{-- @can('create_complaint') --}}

            <li class="nav-item">
                <a href="/admin/tc" class="nav-link @if (Session::get('active') == 'transercertificates') active @endif">
                    <i class="nav-icon fab fa-accusoft"></i>
                    <p>
                        Transer Certificate
                    </p>
                </a>
            </li>
            {{-- @endcan --}}

            {{-- @can('reports_list') --}}
            {{-- <li class="nav-item">
            <a href="/admin/gallery" class="nav-link @if (Session::get('active') == 'gallery') active @endif">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Gallery
              </p>
            </a>
          </li> --}}

            <li class="nav-item">
                <a href="/admin/scout-&-guide" class="nav-link @if (Session::get('active') == 'scout-&-guide') active @endif">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Scout & Guide
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/sports" class="nav-link @if (Session::get('active') == 'sports') active @endif">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Sport
                    </p>
                </a>
            </li>


            {{-- @endcan --}}
            {{-- @can('create_unsolditems') --}}
            {{-- <li class="nav-item">
            <a href="/admin/unsold-items" class="nav-link @if (Session::get('active') == 'unsold') active @endif">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Items In Stock 
              </p>  
            </a>
          </li> --}}
            <!-- {{-- @endcan --}} -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
