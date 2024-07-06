<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

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
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- /theme JS files -->

</head>

<body>

  <!-- Main navbar -->
  <div class="navbar navbar-expand-md navbar-dark bg-slate navbar-static">
    <div class="navbar-brand">
      <a href="index.html" class="d-inline-block">
        <img src="../../../../global_assets/images/logo_light.png" alt="">
      </a>
    </div>
  </div>
  <!-- /main navbar -->


  <!-- Page content -->
  <div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Content area -->
      <div class="content d-flex justify-content-center align-items-center">

        @yield('content')


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

</body>
</html>
