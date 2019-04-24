@extends('master')

@section('content')

	<div class="container">

		<ol class="breadcrumb">
			<h4 class="breadcrumb-item active text-danger ">Bạn Đang ở chế độ xem </a></h4>   
		</ol>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="">Home</a>
			</li>
			<li class="breadcrumb-item active"> <a href="friend/id=10000{{$info_friend['id_user'] }}">Click Back {{$info_friend['name'] }}</a></li>  
			<li class="breadcrumb-item active">Xem Chương : {{ $name_chapter['chapter_name'] }} - {{ $name_chapter['chapter_item'] }}</li>  
		</ol>

<style type="text/css">
  body{
            font-family: 'Work Sans', sans-serif;
            color: #333;
            font-weight: 300;
            text-align: center;
            background-color: #30B4C3;
          }
</style>
		<hr>
			<div class="container">
				<div class="row ">
						@php  
			          $i=0;
			          @endphp
					@foreach($QuestionRandom as $rowListQuestion)
					@php  
			          $i++;
			          @endphp
					<div class="list-group o-hidden col-xl-4 col-sm-5 mb-6" >
					
						<a data-toggle="modal" data-target="#logoutModal{{ $rowListQuestion['id'] }}" class="list-group-item list-group-item-action flex-column align-items-start">
							<div class="d-flex w-100 justify-content-between card ">
								<h5 class="mb-1">Câu {{ $i }} :<small>{{ $rowListQuestion['content_question'] }}</small> </h5>
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
							<h4><p class="text-center card bg-danger">Chế độ xem</p></h4>
						</a>


{{-- href="admin/xoacauhoi/{{ $rowListQuestion['id'] }}/{{ $rowListQuestion['id_matrix'] }}"  --}}

						<div class="modal fade" id="logoutModal{{ $rowListQuestion['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Thông báo không đủ quyền!</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">Đang chế độ xem người dùng: {{ $rowListQuestion['content_question'] }} </div>
									<div class="modal-footer">
										<button class="btn btn-primary text-white" type="button"> <a href="friend/id=10000{{$info_friend['id_user'] }}"><strong>Về trang quản lý </strong> </button>
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
	<hr>
    @include('logout')
	
@endsection