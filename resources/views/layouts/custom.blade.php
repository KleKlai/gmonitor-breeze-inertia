<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GMonitor</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  @yield('style')
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="/js/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        let pusher = new Pusher('0134b0df47cadbe2fef4', {
            cluster: 'mt1',
        });

        let oldVal = 0;
        let temp = null;
        let item = null;
    </script>
    <style>
        .answer-list li, .ask-list li {
            /* padding: 10px 15px; */
            list-style: none;
            border-radius: 3px;
            line-height: 0;
        }
        .answer-list img, .ask-list img {
            width: 45px;
            border-radius: 50%;
            /* float: left; */
        }
        .answer-list .about, .ask-list .about {
            float: left;
            padding-left: 8px;
        }
        .answer-list li .name, .ask-list li .name {
            color: #999;
            font-size: 13px;
        }
        .answer-list .answer, .ask-list .answer {
            font-size: 15px;
        }
        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }
    </style>
</head>

{{--  <body>  --}}
<body class="sidebar-icon-only">

  <div class="container-scroller">
    @include('layouts.sub-layout.top-nav-bar')
    <div class="container-fluid page-body-wrapper">
      @include('layouts.sub-layout.left-nav-link')
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('body')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            {{--  <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0">Copyright © 2021. All rights reserved.</span>  --}}
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
  {{-- <script src="{{ asset('asset/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  @yield('script')
  <!-- inject:js -->
  <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
  {{-- <script src="{{ asset('asset/js/hoverable-collapse.js') }}"></script> --}}
  {{-- <script src="{{ asset('asset/js/template.js') }}"></script>
  <script src="{{ asset('asset/js/settings.js') }}"></script>
  <script src="{{ asset('asset/js/todolist.js') }}"></script> --}}
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
