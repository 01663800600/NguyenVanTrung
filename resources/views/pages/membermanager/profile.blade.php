@extends('master')

@section('content')

<div class="container">
	<div class="row user-menu-container square ">
					@foreach($infor_user as $rowInfoFrofile)
				@foreach($rowInfoFrofile['info_user'] as $rowInfoUser)

		<div class="col-md-7 user-details card">
			<div class="row coralbg white">
				<div class="col-md-6 no-pad">
					<div class="user-pad ">
						<h3>Welcome, {{ Auth::user()->name }}</h3>
						<h4 class="white"><i class="fa fa-check-circle-o"></i> Thành Viên Thường</h4>
						<h4 class="white"><i class="fa fa-twitter"></i>+{{ $rowInfoUser['created_at'] }}</h4>
						<button type="button" class="btn btn-labeled btn-info" href="#">
							<span class="btn-label"><i class="fa fa-pencil"></i></span>Sửa thông tin</button>
							<button type="button" class="btn btn-labeled btn-success" href="friend.php">
								<span class="btn-label"><i class="fa fa-pencil"></i></span>Bạn bè</button>
							</div>
						</div>
					<div class="col-md-5">
						<div class="">
							<img  src="img/{{ $rowInfoUser['images'] }}" class="img-responsive thumbnail">
						</div>
					</div>

				</div>
				<div class="row overview">
					<div class="col-md-4 user-pad text-center">
						<h3>Bạn bè</h3>
						<h4>{{ $rowInfoFrofile['banbe'] }}</h4>
					</div>
					<div class="col-md-4 user-pad text-center">
						<h3>Câu hỏi</h3>
						<h3>{{ $rowInfoFrofile['cauhoi'] }}</h3>
						<small>Đề tạo: {{ $rowInfoFrofile['dethi'] }}</small>
					</div>
					<div class="col-md-4 user-pad text-center">
						<h3>Số like</h3>
						<h4>114</h4>
					</div>
				</div>
			</div>

			<div class="col-md-1 user-menu-btns card">
				<div class="btn-group-vertical square" id="responsive">
					<a href="#" class="btn btn-block btn-default active">
						<i class="fa fa-laptop fa-3x"></i>
					</a>
					<a href="#" class="btn btn-default">
						<i class="fa fa-bell-o fa-3x"></i>
					</a>
					<a href="#" class="btn btn-default">
						<i class="fa fa-laptop fa-3x"></i>
					</a>
					<a href="#" class="btn btn-default">
						<i class="fa fa-cloud-upload fa-3x"></i>
					</a>
				</div>
			</div>

			<div class="col-md-4 user-menu user-pad card">
				<div class="user-menu-content active">
					<h3>
						{{ $rowInfoUser['full_name'].' '.Auth::user()->name }}
					</h3>
					<ul class="user-menu-list">
						<li>
							<h4><i class="fa fa-user coral"></i> @if($rowInfoUser['gender']==0) : Nam @else Nữ @endif</h4>
						</li>
						<li>
							<h4><i class="fa fa-heart-o coral"></i> {{ $rowInfoUser['introduct'] }}</h4>
						</li>
						<li>
							<h4><i class="fa fa-paper-plane-o coral"></i>  {{ $rowInfoUser['title_user'] }}</h4>
						</li>
						<li>
							<button type="button" class="btn btn-labeled btn-success" href="#">
								<span class="btn-label"><i class="fa fa-laptop"></i></span>Xem toàn bộ</button>
							</li>
						</ul>
					</div>
					<div class="user-menu-content">
						<h3>
							Thông báo mới nhất
						</h3>
						<ul class="user-menu-list">
							<li>
								<h4>Đạt điểm 10 đề thi của bạn <small class="coral"><strong>NEW</strong> <i class="fa fa-clock-o"></i> 7:42 A.M.</small></h4>
							</li>
							<li>
								<h4>From Jonathan Hawkins <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
							</li>
							<li>
								<h4>From Georgia Jennings <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
							</li>
							<li>
								<button type="button" class="btn btn-labeled btn-danger" href="#">
									<span class="btn-label"><i class="fa fa-bell-o"></i></span>Xem toàn bộ</button>
								</li>
							</ul>
						</div>
						<div class="user-menu-content">
							<h3>
								Trending
							</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="view">
										<div class="caption">
											<p>47LabsDesign</p>
											<a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
											<a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
										</div>
										<img src="http://24.media.tumblr.com/273167b30c7af4437dcf14ed894b0768/tumblr_n5waxesawa1st5lhmo1_1280.jpg" class="img-responsive">
									</div>
									<div class="info">
										<p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
										<p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
										</div>
										<div class="stats turqbg">
											<span class="fa fa-heart-o"> <strong>47</strong></span>
											<span class="fa fa-eye pull-right"> <strong>137</strong></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="view">
											<div class="caption">
												<p>47LabsDesign</p>
												<a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
												<a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
											</div>
											<img src="http://24.media.tumblr.com/282fadab7d782edce9debf3872c00ef1/tumblr_n3tswomqPS1st5lhmo1_1280.jpg" class="img-responsive">
										</div>
										<div class="info">
											<p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
											<p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
											</div>
											<div class="stats turqbg">
												<span class="fa fa-heart-o"> <strong>47</strong></span>
												<span class="fa fa-eye pull-right"> <strong>137</strong></span>
											</div>
										</div>
									</div>
								</div>
								<div class="user-menu-content">
									<h2 class="text-center">
										Upload
									</h2>
									<center><i class="fa fa-cloud-upload fa-4x"></i></center>
									<div class="share-links">
										<center><button type="button" class="btn btn-lg btn-labeled btn-success" href="#" style="margin-bottom: 15px;">
											<span class="btn-label"><i class="fa fa-laptop"></i></span>Tạo câu hỏi
										</button></center>
										<center><button type="button" class="btn btn-lg btn-labeled btn-warning" href="#">
											<span class="btn-label"><i class="fa fa-laptop"></i></span>Tạo đề thi
										</button></center>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endforeach


					<hr>
				@if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                            {{ $err }}
                                    @endforeach

                                </div>
                        @endif 
                        
                        @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{ session('thongbao') }}
                                </div>
                        @endif
					<div class="container">
						<div class="row">
							<ol class="col-lg-12 col-md-12 col-sm-12">
								<li class="breadcrumb-item">

									<h4 class="text-center "> Môn Học đã tạo /  <a type="button" class="btn btn-primary"  data-toggle="modal" data-target="#taomonhocmoi">Click tạo môn học mới</a> </h4> 
								</li>
							</ol>
							<hr>
							@php  
							$i=0;
							@endphp

							@foreach($list_matrix as $rowListMatrix)
							@php  
							$i++;
							@endphp

							<div class="col-4">
								<a class="bg-danger list-group-item list-group-item-action active"  href="#" data-toggle="modal" data-target="#logoutModal{{ $i }}">Môn học {{ $rowListMatrix['name_subject'] }}</a>
								<div class="list-group" id="list-tab" role="tablist">


									@foreach($rowListMatrix['list_name_chapter'] as $rowListChapter)
									<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile{{  $rowListChapter['id_chapter'] }}" role="tab" >Chương {{ $rowListChapter['name_chapter'] }}</a>

									@endforeach

								</div>
							</div>
							<div class="card col-8">
								<div class="tab-content" id="nav-tabContent">	
									<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"> <p><h4>(*) Chọn môn để thêm chương</h4></p><p>(**) Chọn Chương hiển thị Mục đã tạo </p><p>(***) Xóa chương <a href="">yêu cầu xóa tất cả môn </a></p></div>

									@foreach($rowListMatrix['list_name_chapter'] as $key => $rowListChapter)

									<div class="tab-pane fade" id="list-profile{{  $rowListChapter['id_chapter'] }}" role="tabpanel" aria-labelledby="list-profile-list">

										@foreach($rowListChapter['list_chapter_item'] as $rowListItem)
											
										<div class="container">
											<div class="col-xl-12 col-sm-4 mb-3">
												<div class="card text-white @if($i%2==0) bg-success @else  bg-info @endif h-100">
													<a class="card-footer text-white clearfix small z-1" href="profile-question/{{ $rowListItem['matrix_id'] }}">
														<span class="float-left">Click : {{ $rowListItem['item_name'] }}</span>
														<span class="float-right">
															<i class="fas fa-angle-right"></i>
														</span>
													</a>
												</div>
											</div>
										</div>

										@endforeach

										<footer class="small">

											<a type="button" class="btn btn-primary small" data-toggle="modal" data-target="#themmucmoi{{ $key }}" >Add Mục mới</a>

										</footer>	
									</div>
{{-- @dd($rowListMatrix['list_name_chapter']) --}}
									<div class="modal fade" id="themmucmoi{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Bạn muốn !</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">Nhap ten <a href="gopy">click vào đây</a>.</div>
										<div class="modal-footer">
											<a class="btn btn-primary" href="logout">Tên</a>
											<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>
									@endforeach
								</div>
							</div>

							<div class="modal fade" id="logoutModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Bạn muốn !</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">Bạn muốn Xem kiểu danh sách :  {{ $rowListMatrix['name_subject'] }} <a href="gopy">click vào đây</a>.</div>
										<div class="modal-footer">
											<a class="btn btn-primary" href="logout">Thêm chương Môn : {{ $rowListMatrix['name_subject'] }}</a>
											<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>
							@endforeach


							<div class="modal fade" id="taomonhocmoi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">

									<form action="profile-created-subject" method="post" accept-charset="utf-8">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Yêu cầu nhập  !</h5>
												<button class="close" type="button" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<p>
												<select class="form-control bg-danger text-white" name="tenmon" >
													<option value="">Chon Tên Môn Học</option>}
													@foreach($get_subject_user as $rowSubject)
													<option value="{{ $rowSubject['id'] }}">{{ $rowSubject['subject_name'] }} </option>
													@endforeach
												</select>
											</p>
											<p class="mb-1 card bg-primary text-white">
												<label>Nhập tên chương</label>
												<input type="text"  name="tenchuong" placeholder="Không quá 190 ký tự">
											</p>
											<p class="mb-1 card bg-primary text-white">
												<label>chuyên mục của trương</label>
												<input type="text"  name="tenmuc" placeholder="Không quá 1000 ký tự">
											</p>
											<div class="modal-footer">
												<button class="btn btn-primary" type="submit">Tạo Môn Học</button>
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					@include('logout')



					<style type="text/css">

						.square, .btn {
							border-radius: 0px!important;
						}

						/* -- color classes -- */
						.coralbg {
							background-color: #FA396F;
						} 

						.coral {
							color: #FA396f;
						}

						.turqbg {
							background-color: #46D8D2;
						}

						.turq {
							color: #46D8D2;
						}

						.white {
							color: #fff!important;
						}

						/* -- The "User's Menu Container" specific elements. Custom container for the snippet -- */
						div.user-menu-container {
							z-index: 10;
							background-color: #fff;
							margin-top: 20px;
							background-clip: padding-box;
							opacity: 0.97;
							filter: alpha(opacity=97);
							-webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
							box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
						}

						div.user-menu-container .btn-lg {
							padding: 0px 12px;
						}

						div.user-menu-container h4 {
							font-weight: 300;
							color: #8b8b8b;
						}

						div.user-menu-container a, div.user-menu-container .btn  {
							transition: 1s ease;
						}

						div.user-menu-container .thumbnail {
							width:100%;
							min-height:200px;
							border: 0px!important;
							padding: 0px;
							border-radius: 0;
							border: 0px!important;
						}

						/* -- Vertical Button Group -- */
						div.user-menu-container .btn-group-vertical {
							display: block;
						}

						div.user-menu-container .btn-group-vertical>a {
							padding: 20px 25px;
							background-color: #46D8D2;
							color: white;
							border-color: #fff;
						}

						div.btn-group-vertical>a:hover {
							color: white;
							border-color: white;
						}

						div.btn-group-vertical>a.active {
							background: #FA396F;
							box-shadow: none;
							color: white;
						}
						/* -- Individual button styles of vertical btn group -- */
						div.user-menu-btns {
							padding-right: 0;
							padding-left: 0;
							padding-bottom: 0;
						}

						div.user-menu-btns div.btn-group-vertical>a.active:after{
							content: '';
							position: absolute;
							left: 100%;
							top: 50%;
							margin-top: -13px;
							border-left: 0;
							border-bottom: 13px solid transparent;
							border-top: 13px solid transparent;
							border-left: 10px solid #46D8D2;
						}
						/* -- The main tab & content styling of the vertical buttons info-- */
						div.user-menu-content {
							color: #323232;
						}

						ul.user-menu-list {
							list-style: none;
							margin-top: 20px;
							margin-bottom: 0;
							padding: 10px;
							border: 1px solid #eee;
						}
						ul.user-menu-list>li {
							padding-bottom: 8px;
							text-align: center;
						}

						div.user-menu div.user-menu-content:not(.active){
							display: none;
						}

						/* -- The btn stylings for the btn icons -- */
						.btn-label {position: relative;left: -12px;display: inline-block;padding: 6px 12px;background: rgba(0,0,0,0.15);border-radius: 3px 0 0 3px;}
						.btn-labeled {padding-top: 0;padding-bottom: 0;}

						/* -- Custom classes for the snippet, won't effect any existing bootstrap classes of your site, but can be reused. -- */

						.user-pad {
							padding: 20px 25px;
						}

						.no-pad {
							padding-right: 0;
							padding-left: 0;
							padding-bottom: 0;
						}

						.user-details {
							background: #eee;
							min-height: 333px;
						}

						.user-image {
							max-height:200px;
							overflow:hidden;
						}

						.overview h3 {
							font-weight: 300;
							margin-top: 15px;
							margin: 10px 0 0 0;
						}

						.overview h4 {
							font-weight: bold!important;
							font-size: 40px;
							margin-top: 0;
						}

						.view {
							position:relative;
							overflow:hidden;
							margin-top: 10px;
						}

						.view p {
							margin-top: 20px;
							margin-bottom: 0;
						}

						.caption {
							position:absolute;
							top:0;
							right:0;
							background: rgba(70, 216, 210, 0.44);
							width:100%;
							height:100%;
							padding:2%;
							display: none;
							text-align:center;
							color:#fff !important;
							z-index:2;
						}

						.caption a {
							padding-right: 10px;
							color: #fff;
						}

						.info {
							display: block;
							padding: 10px;
							background: #eee;
							text-transform: uppercase;
							font-weight: 300;
							text-align: right;
						}

						.info p, .stats p {
							margin-bottom: 0;
						}

						.stats {
							display: block;
							padding: 10px;
							color: white;
						}

						.share-links {
							border: 1px solid #eee;
							padding: 15px;
							margin-top: 15px;
						}

						.square, .btn {
							border-radius: 0px!important;
						}

						/* -- media query for user profile image -- */
						@media (max-width: 767px) {
							.user-image {
								max-height: 400px;
							}
						}

					</style>
					<script type="text/javascript">
						$(document).ready(function() {
							var $btnSets = $('#responsive'),
							$btnLinks = $btnSets.find('a');

							$btnLinks.click(function(e) {
								e.preventDefault();
								$(this).siblings('a.active').removeClass("active");
								$(this).addClass("active");
								var index = $(this).index();
								$("div.user-menu>div.user-menu-content").removeClass("active");
								$("div.user-menu>div.user-menu-content").eq(index).addClass("active");
							});
						});

						$( document ).ready(function() {
							$("[rel='tooltip']").tooltip();    

							$('.view').hover(
								function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
        ); 
						});

					</script>
@endsection