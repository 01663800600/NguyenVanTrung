@extends('mastermember')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="nguoidung">Trang nhất</a>
  </li>
  <li class="breadcrumb-item active">Ôn Thi</a></li>
</ol>

<!-- Icon Cards-->
<div class="row">

  @foreach($Class as $rowClass)
  @if(count($rowClass->subject))
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa fa-bicycle"></i>
        </div>
        <div class="mr-5">Ôn thi {{ $rowClass->class_name }} !</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="onthi/{{ $rowClass->id }}">
        <span class="float-left">Vào ôn</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  @endif
  @endforeach


</div>

<!-- Area Chart Example biêu đồ-->
      {{--   <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div> --}}

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Danh sách Chương ôn thi hệ thống </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Người Tạo</th>
                    <th>Môn Học</th>
                    <th>Chương</th>
                    <th>Mục</th>
                    <th>Số câu hỏi</th>
                    <th>Ngẫu nhiên</th>
                    <th>Xem chi tiết</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Người Tạo</th>
                    <th>Môn Học</th>
                    <th>Chương</th>
                    <th>Mục</th>
                    <th>Số câu hỏi</th>
                    <th>Ngẫu nhiên</th>
                    <th>Xem chi tiết</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($Matrix as $rowMatrix)

                  {{-- có câu hỏi mới hiện --}}
                  @if(count($rowMatrix->questions))
                  <tr>
                    <td>{{ $rowMatrix->user->name }}</td>
                    <td>{{ $rowMatrix->subject->subject_name }}</td>
                    <td>{{ $rowMatrix->chapter }}</td>
                    <td>{{ $rowMatrix->chapter_item }}</td>
                    <td>{{ $rowMatrix->questions->count('id') }}</td>
                    <td><a href="lamonthingaunhien/{{ $rowMatrix->id }}">Vào làm</a></td>
                    <td><a href="">Xem Chi tiết</a></td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Thời gian Cập Nhật {{ date('Y/m/d H:i:s') }} <button type="button" class="btn bg-primary" onclick="tai_lai_trang()">Cập nhật</button></div>
        </div>


        <!-- /.container-fluid -->

        @endsection