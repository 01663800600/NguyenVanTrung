@extends('mastermember')

@section('content')


<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="nguoidung">Trang Nhất</a>
	</li>
    <li class="breadcrumb-item active"><a href="onthi">Ôn Thi </a>/ {{ $Class_name->class_name }}</li>
</ol>


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
                              <th>Lớp</th>
                              <th>người tạo</th>
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
                        <th>Lớp</th>
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
             @foreach($Subjects as $rowSubjects)
             @foreach($rowSubjects->matrixs as $rowMatrixs)
             {{-- có câu hỏi mới hiện --}}
             @if(count($rowMatrixs->questions))
             <tr>
                  <td>{{ $Class_name->class_name }}</td>
                  <td>{{ $rowMatrixs->user->name }}</td>
                  <td>{{ $rowSubjects->subject_name }}</td>
                  {{-- @foreach() --}}
                  <td>{{ $rowMatrixs->chapter }}</td>
                  <td>{{ $rowMatrixs->chapter_item }}</td>
                  <td>{{ $rowMatrixs->questions->count('id') }}</td>
                  <td><a href="lamonthingaunhien/{{ $rowMatrixs->id }}">Vào làm</a></td>
                  <td><a href="">Xem Chi tiết</a></td>
            </tr>
            @endif
            @endforeach
            @endforeach



      </tbody>
</table>
</div>
</div>
<div class="card-footer small text-muted">Thời gian Cập Nhật {{ date('Y/m/d H:i:s') }} <button type="button" class="btn bg-primary" onclick="tai_lai_trang()">Cập nhật</button></div>
</div>


<!-- /.container-fluid -->



@endsection