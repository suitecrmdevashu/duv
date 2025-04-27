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

                @php
                    $active = Session::get('active');
                    $homePageActive = in_array($active, ['marquee', 'banner','facility']);
                @endphp

                <li class="nav-item {{ $homePageActive ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $homePageActive ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @can('create_marquee')
                            <li class="nav-item">
                                <a href="{{ url('/admin/marquee/create/1') }}"
                                    class="nav-link {{ $active === 'marquee' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Marquee</p>
                                </a>
                            </li>
                        @endcan

                        @can('create_banner')
                            <li class="nav-item">
                                <a href="{{ url('/admin/banner') }}"
                                    class="nav-link {{ $active === 'banner' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Banner Images</p>
                                </a>
                            </li>
                        @endcan

                        @can('create_facilities')
                            <li class="nav-item">
                                <a href="{{ url('/admin/facilities') }}"
                                    class="nav-link {{ $active === 'facility' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Facilities</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
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
                                        Holidays
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



            @php
                $aboutActive = in_array(Session::get('active'), [
                    'visionMission',
                    'principal',
                    'mission',
                    'schooloverview',
                    'chairmandesk',
                ])
                    ? 'menu-is-opening menu-open'
                    : '';
            @endphp

            <!-- About Us Menu -->
            <li class="nav-item {{ $aboutActive }}">
                <a href="#" class="nav-link {{ $aboutActive ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>
                        About Us
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    @can('schoolOverView')
                        <li class="nav-item">
                            <a href="/admin/schoolOverView"
                                class="nav-link {{ Session::get('active') == 'schooloverview' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School Overview</p>
                            </a>
                        </li>
                    @endcan

                    @can('visionMission')
                        <li class="nav-item">
                            <a href="/admin/vision&mission"
                                class="nav-link {{ Session::get('active') == 'visionMission' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Vision & Mission</p>
                            </a>
                        </li>
                    @endcan

                    @can('principal_edit')
                        <li class="nav-item">
                            <a href="/admin/principal-desk"
                                class="nav-link {{ Session::get('active') == 'principal' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Principal Desk</p>
                            </a>
                        </li>
                    @endcan

                    @can('chairman_edit')
                        <li class="nav-item">
                            <a href="/admin/chairman-desk"
                                class="nav-link {{ Session::get('active') == 'chairmandesk' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chairman Desk</p>
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



            <li class="nav-item">
                <a href="/admin/social-contact" class="nav-link @if (Session::get('active') == 'socialmedia') active @endif">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Contact Info
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
                        Fee Structure & BUS
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

            <li class="nav-item">
                <a href="/admin/menus" class="nav-link @if (Session::get('active') == 'menu') active @endif">
                    <i class="nav-icon fa fa-cog"></i>
                    <p>
                        Setting
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
