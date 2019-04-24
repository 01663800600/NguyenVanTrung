@extends('admin.masteradmin')


@section('content')
  
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
				@foreach($name_matrix as $nm)
            <h4> Trở lại Chương : <a href="admin/monhoc/{{ $nm->id_subject }}" class="text-danger">{{ $nm->chapter_name }} </a></h4>
            <h4> Mục :  {{ $nm->subject_name_item }} / <a href="admin/monhoc/{{ $nm->id_subject }}" class="text-danger"> Thêm câu hỏi  </a> </h4>

				@endforeach
          </li>
        </ol>
				@if(session('thongbao'))
					<div class="alert alert-success">
						{{ session('thongbao') }}
					</div>

				@endif 
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
					
						<a data-toggle="modal" data-target="#logoutModal{{ $rowListQuestion->id }}" class="list-group-item list-group-item-action flex-column align-items-start">
							<div class="d-flex w-100 justify-content-between card ">
								<h5 class="mb-1">Câu {{ $i }} : {{ $rowListQuestion->content_question }}</h5>
								<small class="text-black">Độ khó : {{ $rowListQuestion->level_of_question }} </small>
							</div>
							<p class="mb-1 card bg-info">1 :AAAAAAAAAAAAAAAAAAAAAa{{ $rowListQuestion->question_a }}</p>
							<p class="mb-1 card bg-info">2 :{{ $rowListQuestion->question_b }}</p>
							<p class="mb-1 card bg-info">3 :{{ $rowListQuestion->question_c }}</p>
							<p class="mb-1 card bg-info">4 :{{ $rowListQuestion->question_d }}</p>
							<small class="text-black card bg-success">Đáp án đúng : {{ $rowListQuestion->answer }}</small>
							<h4><p class="text-center card bg-danger">Click Xóa và Sửa</p></h4>
						</a>


{{-- href="admin/xoacauhoi/{{ $rowListQuestion->id }}/{{ $rowListQuestion->id_matrix }}"  --}}

						<div class="modal fade" id="logoutModal{{ $rowListQuestion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Bạn muốn !</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">Nội dung : {{ $rowListQuestion->content_question }} </div>
									<div class="modal-footer">
										<a class="btn btn-primary" href="admin/suacauhoi/">Sửa câu hỏi</a>
										<a class="btn btn-danger" href="admin/xoacauhoi/{{ $rowListQuestion->id }}/{{ $rowListQuestion->id_matrix }}">Xóa câu hỏi</a>
										<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

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

 @endsection