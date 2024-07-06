<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{config('app.name')}} | @yield('title') </title>

  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/layout.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/components.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/colors.min.css') }}" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/ui/ripple.min.js') }}"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  {{-- <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script> --}}
  <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
  {{-- <script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script> --}}
  <script src="{{ asset('global_assets/js/plugins/ui/perfect_scrollbar.min.js') }}"></script>


  <script src="{{ asset('global_assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
  <script src="{{ asset('global_assets/js/plugins/notifications/noty.min.js') }}"></script>
  {{-- <script src="{{ asset('global_assets/js/demo_pages/extra_jgrowl_noty.js') }}"></script> --}}
  @yield('header-scripts')


  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('global_assets/js/demo_pages/layout_fixed_sidebar_custom.js') }}"></script>
  <!-- /theme JS files -->

</head>

<body class="navbar-top">

  <!-- Main navbar -->
  <div class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="navbar-brand">
      <a href="index.html" class="d-inline-block">
        <img src="{{ asset('global_assets/images/logo_light.png') }}" alt="">
      </a>
    </div>

    <div class="d-md-none">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
        <i class="icon-tree5"></i>
      </button>
      <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
        <i class="icon-paragraph-justify3"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
            <i class="icon-paragraph-justify3"></i>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-md-auto">

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="navbar-nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="icon-switch2"></i>
            <span class="d-md-none ml-2">{{ __('Logout') }}</span>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /main navbar -->


  <!-- Page content -->
  <div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-light sidebar-main sidebar-fixed sidebar-expand-md">

      <!-- Sidebar mobile toggler -->
      <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
          <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
          <i class="icon-screen-full"></i>
          <i class="icon-screen-normal"></i>
        </a>
      </div>
      <!-- /sidebar mobile toggler -->


      <!-- Sidebar content -->
      <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
          <div class="sidebar-user-material-body">
            <div class="card-body text-center">
              <a href="#">
                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
              </a>
              <h6 class="mb-0 text-white text-shadow-dark">{{ \Auth::user()->name }}</h6>
              <span class="font-size-sm text-white text-shadow-dark">ROLE HERE</span>
            </div>
                          
            <div class="sidebar-user-material-footer">
              <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
            </div>
          </div>

          <div class="collapse" id="user-nav">
            <ul class="nav nav-sidebar">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icon-user-plus"></i>
                  <span>My profile</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="icon-switch2"></i>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
          <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->
            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
            <li class="nav-item">
              <a href="{{ route('dashboard.index') }}" class="nav-link">
                <i class="icon-home4"></i>
                <span>
                  Dashboard
                </span>
              </a>
            </li>

            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link"><i class="icon-book"></i> <span>Book Management</span></a>
              <ul class="nav nav-group-sub" data-submenu-title="Settings">
                  <li class="nav-item"><a href="{{ route('books.index') }}" class="nav-link">Books</a></li>
                  <li class="nav-item"><a href="{{ route('authors.index') }}" class="nav-link">Authors</a></li>
                  <li class="nav-item"><a href="{{ route('genres.index') }}" class="nav-link">Genres</a></li>
                
              </ul>
            </li>

            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link"><i class="icon-user"></i> <span>Staff Management</span></a>
              <ul class="nav nav-group-sub" data-submenu-title="Settings">
                <li class="nav-item"><a href="{{ route('staffs.index') }}" class="nav-link">Staff</a></li>
                <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Staff Accounts</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ route('sales.index') }}" class="nav-link"><i class="icon-dollar"></i><span>Sale</span></a>
              
            </li>

          </ul>
        </div>
        <!-- /main navigation -->

      </div>
      <!-- /sidebar content -->
      
    </div>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
            <h4><a href="{{ URL::to('/'); }}" class="text-default"><i class="icon-arrow-left52 mr-2"></i> </a><span class="font-weight-semibold">@yield('header-title') </span></h4>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>

          <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
              @yield('top-actions')
            </div>
          </div>
        </div>

      </div>
      <!-- /page header -->


      <!-- Content area -->
      <div class="content">

        @yield('page-content')

      </div>
      <!-- /content area -->


      <!-- Footer -->
      <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
          <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
          </button>
        </div>

      </div>
      <!-- /footer -->

    </div>
    <!-- /main content -->

  </div>
  <!-- /page content -->








@yield('footer-scripts')


@include('flash.flash')

</body>
</html>
