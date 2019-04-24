@extends('master')

@section('content')


	<div class="container">

		<div class=" text-center">
			@foreach($name_matrix as $nm)
			<h4> {{ $nm['chapter_name'] }} => {{ $nm['subject_name_item'] }}<a href="profile.php" class="text-danger"> / trở về </a></h4>
			<a href="profile-created-question/{{ $idmatrix }}"> <h4 >Click :Thêm câu hỏi </h4></a>

			@endforeach

		</div>

		<hr>
		<div class="container">
			<div class="row ">
			

				<div class="card mb-3 col-md-12 col-sm-12 col-lg-12">
					<div class="card-header bg-danger"><h4>
					Dễ quản lý hơn với dạng Danh Sách</h4></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nội dung câu hỏi</th>
										<th>Câu hỏi Đúng</th>
										<th>Status</th>
										<th> </th>

										
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Nội dung câu hỏi</th>
										<th>Câu hỏi Đúng</th>
										<th>Status</th>
										<th> </th>

									</tr>
								</tfoot>
								<tbody>
										@foreach($list_question as $rowListQuestion)

									<tr>
										<td> <small> {{ $rowListQuestion['content_question'] }}</small></td>
										<td> <small>
												 @if($rowListQuestion['answer']== 1) {{ $rowListQuestion['question_a'] }}  
												@elseif($rowListQuestion['answer']== 2) {{ $rowListQuestion['question_b'] }}  
												@elseif($rowListQuestion['answer']== 3) {{ $rowListQuestion['question_c'] }}  
												@elseif($rowListQuestion['answer']== 4) {{ $rowListQuestion['question_d'] }}  
												@else
													Chưa có đáp án
												@endif
											</small>
										</td>

										<td><a href="XemDeThi"><small>
											
											@if($rowListQuestion['status_question']== 1) Công khai  
											@elseif($rowListQuestion['status_question']== 2) Bạn bè
											@elseif($rowListQuestion['status_question']== 3) Riêng tư
											@endif
										</small></a></td>
										<td><a data-toggle="modal" data-target="#logoutModal{{ $rowListQuestion['id'] }}" class="list-group-item list-group-item-action flex-column align-items-start">click</a></td>
									</tr>             
										@endforeach

								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer small text-muted">Thời gian Cập Nhật {{ date('Y/m/d H:i:s') }} <button type="button" class="btn bg-primary" onclick="tai_lai_trang()">Cập nhật</button></div>
				</div>


			</div>
		</div>

		@if(session('thongbao'))
		<div class="alert alert-success">
			{{ session('thongbao') }}
		</div>

		@endif 
		<hr>
			<div class="container">
				<div class="row ">
						@php  
			          $i=0;
			          @endphp
					@foreach($list_question as $rowListQuestion)
					@php  
			          $i++;
			          @endphp
					<div class="list-group o-hidden col-xl-4 col-sm-5 mb-6" >
					
						<a data-toggle="modal" data-target="#logoutModal{{ $rowListQuestion['id'] }}" class="list-group-item list-group-item-action flex-column align-items-start">
							<div class="d-flex w-100 justify-content-between card ">
								<h5 class="mb-1">Câu {{ $i }} : {{ $rowListQuestion['content_question'] }}</h5>
								<small class="text-black">Độ khó : {{ $rowListQuestion['level_of_question'] }} </small>
								<small class="text-black">Trạng Thái :
								 
								 @if($rowListQuestion['status_question']== 1) Công khai  
								@elseif($rowListQuestion['status_question']== 2) Bạn bè
								@elseif($rowListQuestion['status_question']== 3) Riêng tư
								@endif

								 </small>
							</div>
							<p class="mb-1 card ">1 :{{ $rowListQuestion['question_a'] }}</p>
							<p class="mb-1 card ">2 :{{ $rowListQuestion['question_b'] }}</p>
							<p class="mb-1 card ">3 :{{ $rowListQuestion['question_c'] }}</p>
							<p class="mb-1 card ">4 :{{ $rowListQuestion['question_d'] }}</p>
							<small class="text-black card bg-success">Đáp án đúng : {{ $rowListQuestion['answer'] }}</small>
							<h4><p class="text-center card bg-danger">Click Xóa và Sửa</p></h4>
						</a>


{{-- href="admin/xoacauhoi/{{ $rowListQuestion['id'] }}/{{ $rowListQuestion['id_matrix'] }}"  --}}

						<div class="modal fade" id="logoutModal{{ $rowListQuestion['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Bạn muốn !</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-footer">
										<a class="btn btn-danger" href="question-delete/{{ $rowListQuestion['id'] }}/{{ $rowListQuestion['id_matrix'] }}">Xóa câu hỏi</a>
										<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

									</div>
									<div class="modal-body">
										<form action="profile-edit-question" method="POST">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<p class="mb-1 card ">nhập Nội dung câu hỏi sửa : <input type="text" name="noidungcauhoi" value="{{ $rowListQuestion['content_question'] }}"></p>

										<p class="mb-1 card ">Nhập câu hỏi sửa 1 : <input type="text" name="cauhoi1" value="{{ $rowListQuestion['question_a'] }}"></p>
										<p class="mb-1 card ">Nhập câu hỏi sửa 2 : <input type="text"  name="cauhoi2" value="{{ $rowListQuestion['question_b'] }}"></p>
										<p class="mb-1 card ">Nhập câu hỏi sửa 3 : <input type="text"  name="cauhoi3" value="{{ $rowListQuestion['question_c'] }}"></p>
										<p class="mb-1 card ">Nhập câu hỏi sửa 4 : <input type="text"  name="cauhoi4" value="{{ $rowListQuestion['question_d'] }}"></p>
										<p>
											<select class="form-control" name="dapan" >

													<option value="{{ $rowListQuestion['answer'] }}">chọn đổi Đáp án đúng</option>
													<option value="1">1 </option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="3">4</option>

												</select>
										</p>
										<p>
												<select class="form-control" name="trangthai" >

													<option value="{{ $rowListQuestion['status_question'] }}">chọn đổi trạng thái</option>
													<option value="1">Công khai </option>
													<option value="2">Bạn bè</option>
													<option value="3">Riêng tư</option>

												</select>

										</p>
										<p>
											<select class="form-control" name="dokho">

												<option value="{{ $rowListQuestion['level_of_question'] }}">chọn đổi độ khó</option>
												<option value="7">Hơi khó</option>
												<option value="10">Cực khó</option>
												<option value="5">trung bình</option>
												<option value="3">khá dễ</option>
												<option value="1">Cực dễ</option>


											</select>


										</p>
											<input type="hidden" name="id_quesion" value="{{ $rowListQuestion['id'] }}">
											<input type="hidden" name="id_matrix" value="{{ $idmatrix }}">
											<p><button type="submit" class="btn btn-primary">Sửa câu hỏi</button>
												<button type="reset" class="btn btn-default">Làm MỚi</button></p>

										</form>

									</div>
									
								</div>
							</div>
						</div>

					</div>
					@endforeach

				</div>
			<div class="row">
			<p class="mb-1 card"><h3>Có {{ $i }} Câu hỏi</h3></p>
           </div>
	</div>
	    @include('logout')
	<hr>

@endsection