<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  {{-- <title>SB Admin - Login</title> --}}
  <title>Admin - Login</title>
  <base href="{{ asset('') }}">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container ">
    <div class="card card-login mx-auto mt-5 ">
      <div class="card-header text-center text-danger"><h4>Admin Login</h4></div>
      <div class="card-body">

        @if(Auth::check())
          
          @if(Auth::user()->level >= 1 )
                <div class="alert alert-success">
                  <h5 class="text-center">Vai trò {{ Auth::user()->name }} Super</h5>
                  <a href="admin/trangchu"><p>-> Về trang quản lí</p></a>

                </div>
          @else 
                @if(session('thongbao'))
                   <div class="alert alert-danger">
                      {{ session('thongbao') }}
                  </div>
                  <div class="alert alert-success">
                      <h5 class="text-center">Đã đăng nhập Quyền member : {{ Auth::user()->name }}</h5>    
                  </div>
                 @endif 
          @endif
           <h5 class="text-center">Chào  : {{ Auth::user()->name }}</h5>
          <a href=""><p>-> Về trang chủ</p></a>
        <a class="btn btn-primary" type="button"  data-toggle="modal" data-target="#logoutModal">Đăng Xuất </a>
        @include('logout')
        @else
        {{-- inthong bao loi --}}
        @if(count($errors)>0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $err)
          {{ $err }} <br>
          @endforeach
        </div>
        @endif

        @if(session('thongbao'))
        <div class="alert alert-danger">
          {{ session('thongbao') }}
        </div>
        @endif 

        <form action="tracnghiem-login-admin" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control text-danger" name="email" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
