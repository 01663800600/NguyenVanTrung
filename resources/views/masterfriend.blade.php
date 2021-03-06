  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Friend - Dashboard</title>
    <base href="{{ asset('') }}">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    @yield('css')
    <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/watch.js"></script>

  </head>

  <body id="page-top">

    @include('layouts/member/header_member')

    <div id="wrapper">

      @include('layouts/friend/right_friend')

      <div id="content-wrapper">

        <div class="container-fluid">
          
          @yield('content')

        </div>


      </div>

      {{-- @include('layouts/member/footer_member') --}}

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('logout')

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
   {{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}
   
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script> 

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    
    {{-- dữ liệu biểu đò đã xóa <script src="js/demo/chart-area-demo.js"></script> --}}
 <script>
        function tai_lai_trang(){
            location.reload();
        }
    </script>

    @yield('script')

  </body>

  </html>
