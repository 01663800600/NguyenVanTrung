<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>VietHanIT - MotDiemTua</title>
    <base href="{{ asset('') }}">
    
    <!-- Favicon  -->

    <link rel="icon" href="img/core-img/favicon.ico">
    
    <!-- Style CSS -->
    
   

    <!-- Page level plugin CSS-->

    <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet">


    {{-- <script src="css/bootstrap.min.css"></script> --}}

        <!-- jQuery (Necessary for All JavaScript Plugins) -->
    
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
    
     @yield('css')

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- ***** Header Area Start ***** -->
    @include('layouts/header')
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area">

        <!-- Hero Slides Area -->
        @include('layouts/slide')
        
        <!-- Hero Post Slide -->
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        @yield('content')
    </div>
    <!-- ***** Footer Area Start ***** -->
    @include('layouts/footer')

    <!-- ***** Footer Area End ***** -->


<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    {{-- <script src="js/sb-admin.min.js"></script> --}}



    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>





    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js home -->
    <script src="js/plugins.js"></script>
    <!-- Active js  home-->
    <script src="js/active.js"></script>
     <script>
        function tai_lai_trang(){
            location.reload();
        }
    </script>
    @yield('js')
</body>

</html>