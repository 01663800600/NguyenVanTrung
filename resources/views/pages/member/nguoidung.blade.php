@extends('mastermember')

@section('content')

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="">Về trang chủ</a>
          </li>
  <li class="breadcrumb-item active"><a href="nguoidung">Thông tin user</a></li>

        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Thông Báo hệ thông!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Xem Chi tiết</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Bắt đầu thi !</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="thihethong">
                <span class="float-left">Vao Thi</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-eye"></i>
                </div>
                <div class="mr-5">Ôn thi trắc nghiệm  !</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="onthi">
                <span class="float-left">Vào ôn thi</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-cubes"></i>
                </div>
                <div class="mr-5">Vào Nhóm Học !</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Vào Ngay</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Điểm hệ thống của bạn</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Mã đề</th>
                    <th>Tiêu đề</th>
                    <th>Số câu hỏi</th>
                    <th>Điểm</th>
                    <th>Ngày làm</th>
                    <th>Thời gian</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Mã đề</th>
                    <th>Tiêu đề</th>
                    <th>Số câu hỏi</th>
                    <th>Điểm</th>
                    <th>Ngày làm</th>
                    <th>Thời gian</th>
                    <th>Action</th>
                    
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td><a href="XemDeThi">Chi Tiết</a></td>
                  </tr>                
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Thời gian Cập Nhật {{ date('Y/m/d H:i:s') }} <button type="button" class="btn bg-primary" onclick="tai_lai_trang()">Cập nhật</button></div>
        </div>

      </div>
      <!-- /.container-fluid -->
<script type="text/javascript">
    $(document).ready(function() {
        var isAuth = "<?php echo Auth::check(); ?>";

        if (window.location.href === 'http://local.myapp.in/login/')
        {
            if (isAuth) location.href('http://localhost/DA_Laravel_TracNghiem/public/');
        }
        else
        {
            if (!isAuth) location.href('http://localhost/DA_Laravel_TracNghiem/public/');
        }
    });
</script>
@endsection