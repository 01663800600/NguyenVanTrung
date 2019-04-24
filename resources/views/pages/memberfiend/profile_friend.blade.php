@extends('masterfriend')

@section('css')

<link rel="stylesheet" href="my_friend.css">


@endsection

@section('content')
	
	<div class="contrainer">
		

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

	
	 @if(session('thongbao'))
          <script type="text/javascript"> alert("{{ session('thongbao') }}") </script>
        @endif 
<div id="user-profile-2" class="user-profile">

		<div class="tabbable">
			<ul class="nav nav-tabs padding-18">
				<li class="active">
					<a data-toggle="tab" href="#home">
						<i class="green ace-icon fa fa-user bigger-120"></i>
						Giới thiệu
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#feed">
						<i class="orange ace-icon fa fa-rss bigger-120"></i>
						Danh Sách đề thi
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#friends">
						<i class="blue ace-icon fa fa-users bigger-120"></i>
						Bạn bè chung
					</a>
				</li>

			</ul>

			<div class="tab-content no-border padding-24">
				<div id="home" class="tab-pane in active">
					<div class="row">
						<div class="col-xs-12 col-sm-3 center">
							<span class="profile-picture">
								<img class="editable img-responsive" alt=" Avatar" id="avatar2" src="img/{{ $info_friend['images'] }}">
							</span>

							<div class="space space-4"></div>
							@if( $info_friend['status_friend']== 1)

							<a href="#" class="btn btn-sm btn-block btn-success">
								<span class="bigger-110"> Đã là bạn bè </span>
							</a>
							@elseif( $info_friend['status_friend']== 0)
							<a href="#" class="btn btn-sm btn-block btn-primary">
								<span class="bigger-110"> Thêm bạn </span>
							</a>
							@else
							<a href="#" class="btn btn-sm btn-block btn-danger">
								<span class="bigger-110"> Danh sách đen </span>
							</a>
							@endif
							<a href="#" class="btn btn-sm btn-block btn-primary">
								<i class="ace-icon fa fa-envelope-o bigger-110"></i>
								<span class="bigger-110">Gửi tin nhắn</span>
							</a>
						</div><!-- /.col -->

						<div class="col-xs-12 col-sm-9">
							<h4 class="blue">
								<span class="middle">{{ $info_friend['full_name'].' '.$info_friend['name'] }}</span>

								<span class="label label-purple arrowed-in-right">
									<i class="ace-icon fa fa-star smaller-80 align-middle"></i>
									
								</span>
							</h4>

							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name"> Username </div>

									<div class="profile-info-value">
										<span>{{ $info_friend['full_name'] }}</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Location </div>

									<div class="profile-info-value">
										<i class="fa fa-map-marker light-orange bigger-110"></i>
										<span>Việt hàn</span>
										<span>Ngũ hành sơn</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Age </div>

									<div class="profile-info-value">
										<span>{{ $info_friend['ago'] }}</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> birthday </div>

									<div class="profile-info-value">
										<span>{{ $info_friend['created_at'] }}</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Last Online </div>

									<div class="profile-info-value">
										<span>3 hours ago</span>
									</div>
								</div>
							</div>

							<div class="hr hr-8 dotted"></div>

							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name"> Liên hệ </div>

									<div class="profile-info-value">
										<a href="#" target="_blank">www.alexdoe.com</a>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name">
										<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
									</div>

									<div class="profile-info-value">
										<a href="#">Facebook :{{ $info_friend['name'] }}</a>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name">
										<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
									</div>

									<div class="profile-info-value">
										<a href="#">Add Follow </a>
									</div>
								</div>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->

					<div class="space-20"></div>

					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="widget-box transparent">
								<div class="widget-header widget-header-small">
									<h4 class="widget-title smaller">
										<i class="ace-icon fa fa-check-square-o bigger-110"></i>
										Giới thiệu 
									</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<p>
											{{ $info_friend['introduct'] }}
										</p>
										<p>
											{{ $info_friend['title_user'] }}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /#home -->

				<div id="feed" class="tab-pane">
					<div class="profile-feed row">
						<div class="col-sm-6">
							<div class="profile-activity clearfix">
								@foreach($show_exam_by as $rowShowExam)
								<div>
									<img class="pull-left" alt="Alex Doe's avatar" src="img/{{ $info_friend['images'] }}">
									<a class="user" href="#"> {{ $info_friend['name'] }}</a>
									Tạo đề thi Môn 
									<a href="#">{{ $rowShowExam['subject_name'] }}</a>

									<div class="time">
										<i class="ace-icon fa fa-clock-o bigger-110"></i>
										{{ $rowShowExam['created_at'] }}
									</div>
								</div>
								@endforeach
								<div class="tools action-buttons">
									<a href="#" class="blue">
										<i class="ace-icon fa fa-pencil bigger-125"></i>
									</a>

									<a href="#" class="red">
										<i class="ace-icon fa fa-times bigger-125"></i>
									</a>
								</div>
							</div>

						</div><!-- /.col -->

						<div class="col-sm-6">
							<div class="profile-activity clearfix">
							
							@php
								$a=0;
							@endphp
							@foreach($list_matrix as $rowListMatrix)
							
							
								<div>
									<i class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
									<a class="user" href=""> {{ $info_friend['name'] }} </a>
									Đã thêm Môn {{ $rowListMatrix['name_subject'] }}
									<a href="#">
										@foreach($rowListMatrix['list_name_chapter'] as $rowListChapter)
											@php
												$a++;
											@endphp
										@endforeach

										Có {{ round($a/2,0) }} chương
									</a>
			
									<div class="time">
										<i class="ace-icon fa fa-clock-o bigger-110"></i>
										
									</div>
								</div>
							@endforeach
								<div class="tools action-buttons">
									<a href="#" class="blue">
										<i class="ace-icon fa fa-pencil bigger-125"></i>
									</a>

									<a href="#" class="red">
										<i class="ace-icon fa fa-times bigger-125"></i>
									</a>
								</div>
							</div>

						</div><!-- /.col -->
					</div><!-- /.row -->

					<div class="space-12"></div>

					<div class="center">
						<a type="button" href="list-friend-exam/friend=8F{{ $info_friend['id_user'] }}41T" class="btn btn-sm btn-primary btn-white btn-round">
							<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
							<span class="bigger-110">Xem toàn bộ đề</span>

							<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
						</a>
					</div>
				</div><!-- /#feed -->

				<div id="friends" class="tab-pane">
					<div class="profile-users clearfix">
						<div class="itemdiv memberdiv">
							<div class="inline pos-rel">
								<div class="user">
									<a href="#">
										<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Alexa Doe's avatar">
									</a>
								</div>

								<div class="body">
									<div class="name">
										<a href="#">
											<span class="user-status status-offline"></span>
											Trung 
										</a>
									</div>
								</div>

						
							</div>
						</div>
					</div>

				</div><!-- /#friends -->

			</div>
		</div>
	
	</div>

	</div>
<hr>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body text-success">
				<h3>Môn Học <strong>{{ $info_friend['full_name'].' '.$info_friend['name'] }}</strong> đã tạo</h3>
			</div>
		</div>
		<hr>


		<div class="row">
		
			<hr>
			@php  
			$i=0;
			@endphp

			@foreach($list_matrix as $rowListMatrix)
			@php  
			$i++;
			@endphp

			<div class="col-4">
				<a class="bg-success list-group-item list-group-item-action active">Môn {{ $rowListMatrix['name_subject'] }}</a>
				<div class="list-group" id="list-tab" role="tablist">


					@foreach($rowListMatrix['list_name_chapter'] as $rowListChapter)
					<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile{{  $rowListChapter['id_chapter'] }}" role="tab" >Chương {{ $rowListChapter['name_chapter'] }}</a>

					@endforeach

				</div>
			</div>
			<div class="card col-8">
				<div class="tab-content" id="nav-tabContent">	
					<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><p>(*) Chọn hiển thị  Chương của :{{ Auth::user()->name }} </p><p>(**) Bạn đang xem môn học của : {{ Auth::user()->name }} </a></p></div>

					@foreach($rowListMatrix['list_name_chapter'] as $rowListChapter)

					<div class="tab-pane fade" id="list-profile{{  $rowListChapter['id_chapter'] }}" role="tabpanel" aria-labelledby="list-profile-list">

						@foreach($rowListChapter['list_chapter_item'] as $rowListItem)
		
						<div class="container">
							<div class="col-xl-12 col-sm-4 mb-3">
								<div class="card text-white @if($i%2==0) bg-success @else  bg-info @endif h-100">
									<a class="card-footer text-white clearfix small z-1" href="friend-question/friend=8F{{$info_friend['id_user'] }}41T{{ $rowListItem['matrix_id'] }}">
										<span class="float-left">Click Xem: {{ $rowListItem['item_name'] }}</span>
										<span class="float-right">
											<i class="fas fa-angle-right"></i>
										</span>
									</a>
								</div>
							</div>
						</div>

						@endforeach

					</div>
					@endforeach
				</div>
			</div>

			@endforeach
		</div>
	</div>
	


@endsection