@extends('masterfriend')


@section('content')

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="nguoidung">Home</a>
	</li>
	<li class="breadcrumb-item active"> <a href="{{ URL::previous() }}">Back : Trang trước</a> </li>
	<li class="breadcrumb-item active"> <a href="friend.php">Bạn bè</a> </li>
	<li class="breadcrumb-item active"> Danh sách đề thi {{ $info_friend['full_name'].' '.$info_friend['name'] }} đã tạo </li>
	
</ol>

@if(session('thongbao'))
<script type="text/javascript"> alert("{{ session('thongbao') }}") </script>
@endif 
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Danh sách Đề thi {{ $info_friend['full_name'].' '.$info_friend['name'] }} : dạng xem danh sách</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Môn</th>
							<th>Tóm tắt đề</th>
							<th><i class="fas fa-hourglass-half"></i></th>
							<th><i class="fas fa-question"></i></th>
							<th>level</th>
							<th>Thời gian tạo <i class="fas fa-clock"></i></th>
							<th><i class="fas fa-location-arrow"></i></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Môn</th>
							<th>Tóm tắt đề</th>
							<th><i class="fas fa-hourglass-half"></i></th>
							<th><i class="fas fa-question"></i></th>
							<th>level</th>
							<th>Thời gian tạo <i class="fas fa-clock"></i></th>
							<th><i class="fas fa-location-arrow"></i></th>
													
						</tr>
					</tfoot>
					<tbody>			
						{{-- Làm gọn thằng này ___________________________________________________________________________________--}}
						@foreach($info_exam_name as $rowNameExam)
						@foreach($rowNameExam['list_exam'] as $rowExams)
						<tr>
							<td>{{ $rowNameExam['name_subject'] }}</td>
							<td>{{ $rowExams['title'] }}</td>
							<th>{{ $rowExams['time_to_do'] }}</th>
							<th>{{ $rowExams['number_question'] }}</th>
							<th>{{ $rowExams['level_of_exam'] }}</th>
							<th>{{ $rowExams['created_at'] }}</th>
							<form action="{{ url('lambaibanbe') }}" method="POST" >

								<th> 
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="id_user_friend" value="{{ $info_friend['id_user'] }}">
									<button type="text" name="id_dethi" value="{{ $rowExams['id_exam'] }}" class="btn btn-primary">Thi</button> 
								</th>

							</form>
						</tr>
						@endforeach
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted">Thời gian Cập Nhật {{ date('Y/m/d H:i:s') }} <button type="button" class="btn bg-primary" onclick="tai_lai_trang()">Cập nhật</button></div>
	</div>



					<div class="container">
						
							<hr>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<h4 class="text-center ">Danh sách Đề thi {{ $info_friend['full_name'].' '.$info_friend['name'] }} : dạng xem trực quan </h4>
								</li>
							</ol>
							
							@php  
							$i=0;
							@endphp

							@foreach($info_exam_name as $rowSubject)
							@php  
							$i++;
							@endphp
							<p>

								<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample{{  $i }}" role="button" aria-expanded="false" aria-controls="collapseExample{{  $i }}">
									{{ $rowSubject['name_subject'] }}
								</a>

							</p>
							<div class="collapse" id="collapseExample{{  $i }}">

								<div class="row">
									@foreach($rowSubject['list_exam'] as $rowExams)
									<div class="col-xl-6 col-sm-6 mb-12">
									<form action="{{ url('lambaibanbe') }}" method="POST" >
										
										<div class="card text-white bg-success o-hidden h-100">
		


					
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="id_user_friend" value="{{ $info_friend['id_user'] }}">
									<input type="hidden" name="id_dethi" value="{{ $rowExams['id_exam'] }}">
		
											<button class="card-footer text-white clearfix small z-1" type="text" >
												<span class="float-left">{{ $rowExams['title'] }} | <small>
													<i class="fas fa-hourglass-half">{{ $rowExams['time_to_do'] }}</i> 
													<i class="fas fa-question">{{ $rowExams['number_question'] }}</i>
													<i class="fas fa-question">{{ $rowExams['level_of_exam'] }}</i>
													<i class="fas fa-clock">{{ $rowExams['created_at'] }}</i></small>
												</span>
												<span class="float-right">
													<i class="fas fa-angle-right"></i>
												</span>
											</button>
										</div>
									</div>
</form>
									@endforeach
								</div>

							</div>

							@endforeach
					</div>


@endsection