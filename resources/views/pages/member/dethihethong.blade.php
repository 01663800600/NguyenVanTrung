@extends('mastermember')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="nguoidung">Trang Nhất</a>
	</li>
	<li class="breadcrumb-item active"> <a href="{{ URL::previous() }}">Về trang trước</a> </li>
	<li class="breadcrumb-item active">{{ $Class->class_name }}</li>
	
</ol>


<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Danh sách Đề thi lớp : {{ $Class->class_name }} </div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Môn</th>
							<th>Tiêu đề</th>
							<th>Thơi gian làm</th>
							<th>Số câu hỏi</th>
							<th>Độ khó</th>
							<th>Thời gian tạo</th>
							<th>Vào Thi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Tiêu đề</th>
							<th>Thơi gian làm</th>
							<th>Số câu hỏi</th>
							<th>Độ khó</th>
							<th>Thời gian tạo</th>
							<th>Vào Thi</th>						
						</tr>
					</tfoot>
					<tbody>			
						{{-- Làm gọn thằng này ___________________________________________________________________________________--}}
						@foreach($Exam_class->class_exam as $rowExams)
						<tr>
							<td>{{ $rowExams->id_subject }}</td>
							<td>{{ $rowExams->title }}</td>
							<th>{{ $rowExams->time_to_do }}</th>
							<th>{{ $rowExams->number_question }}</th>
							<th>{{ $rowExams->level_of_exam }}</th>
							<th>{{ $rowExams->created_at }}</th>
							<form action="{{ url('lambai') }}" method="POST" >

								<th> 
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="text" name="id_dethi" value="{{ $rowExams->id }}" class="btn btn-primary">Làm Bài Thi</button> 
								</th>

							</form>
						</tr>
						@endforeach
						{{-- @endforeach --}}
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted">Thời gian Cập Nhật {{ date('Y/m/d H:i:s') }} <button type="button" class="btn bg-primary" onclick="tai_lai_trang()">Cập nhật</button></div>
	</div>


	<!-- /.container-fluid -->
	@endsection
