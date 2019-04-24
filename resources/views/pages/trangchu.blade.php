@extends('master')

@section('content')

@include('simple_html_dom')

<div class="container">
	<div class="row justify-content-center">		
		

		@php
// doc thong tin tu web site nguoi ta
		
// $html = file_get_html('http://doc.viethanit.edu.vn/default.aspx?page=danhsachthongtin&type=1');
// echo $html;

// $html = file_get_html('http://doc.viethanit.edu.vn/default.aspx?page=danhsachthongtin&type=2');
// // foreach($html->find('img') as $element) {
// //        echo '<img src="'.$element->src.'" /><br>';
// // }

// doc the td trong truong	

// $thuoctinh =  $html->find('#ctl00_ContentPlaceHolder1_ctl00_tbThongTin',0)->find('td');
// foreach ($thuoctinh as $e) {
//     // echo $e->plaintext.'<br>';
//     echo $e.'<br>';
   
// };
		
  //vi du doc 1 trang cua vn
    //  $url = 'http://thethao.vnexpress.net/photo/hau-truong/hom-nay-hoang-xuan-vinh-ve-nuoc-nguyen-tien-minh-quyet-dau-lin-dan-3452035.html';
    // $html = file_get_html($url);	
    //  $html->find('.block_thumb_slide_show',0)->outertext='';
    // $html ->load($html ->save());
    // $tieude = $html->find('.title_news',0);
    // $noidung = $html->find('#article_content',0);

		@endphp
{{-- <h1>{!!  $tieude->plaintext !!}</h1>
<div id="content">{!! $noidung->innertext !!}</div> --}}
</div>


 @if(session('thongbao'))
          <script type="text/javascript"> alert("{{ session('thongbao') }}") </script>
        @endif 
<div class="row justify-content-center">
	<!-- ============= Post Content Area Start ============= -->
	<div class="col-12 col-lg-8">
		<div class="post-content-area mb-50">
			<!-- Catagory Area -->
			<div class="world-catagory-area">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="title">Đề Mới nhất</li>

					<li class="nav-item">
						<a class="nav-link active" id="tab1" data-toggle="tab" href="#world-tab-1" role="tab" aria-controls="world-tab-1" aria-selected="falde">Hệ Thống</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="tab2" data-toggle="tab" href="#world-tab-2" role="tab" aria-controls="world-tab-2" aria-selected="true">Cá nhân</a>
					</li>
{{-- 
					<li class="nav-item">
						<a class="nav-link" id="tab3" data-toggle="tab" href="#world-tab-3" role="tab" aria-controls="world-tab-3" aria-selected="false">Nhóm học</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="tab4" data-toggle="tab" href="#world-tab-4" role="tab" aria-controls="world-tab-4" aria-selected="false">điểm 10</a>
					</li> --}}

				</ul>

				<div class="tab-content" id="myTabContent">

					<div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="world-catagory-slider owl-carousel wow fadeInUpBig" data-wow-delay="0.1s">
											@foreach($exam_new_2 as $rowExamNew2)

									<!-- Single Blog Post -->
									<div class="single-blog-post">
										<!-- Post Thumbnail -->
										<div class="post-thumbnail">
											<img src="img/blog-img/b1.jpg" alt="">
											<!-- Catagory -->
											<div class="post-cta"><a href="#">NEW</a></div>
										</div>
										<!-- Post Content -->
										<div class="post-content">

										

											<a href="#" class="headline">
												<h5>{{ $rowExamNew2->title }}</h5>
											</a>
											<span>Số câu hỏi : {{ $rowExamNew2->number_question }}</span>
											<hr>
											<h6>Thời gian làm : {{ $rowExamNew2->time_to_do }} Phút</h6>
											<h6>độ khó : {{ $rowExamNew2->level_of_exam }} </h6>
											<!-- Post Meta -->
											<div class="post-meta">
												<p><a href="#" class="post-author">Người tạo</a> on <a href="#" class="post-date">{{ $rowExamNew2->created_at }}</a></p>
											</div>
											

										</div>
									</div>
											@endforeach
										
									<!-- Single Blog Post -->

								</div>
							</div>
							
								
							<div class="col-12 col-md-6">
								@foreach($exam_new_4 as $rowExamNew4)

								<div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.4s">										
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b12.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>{{ $rowExamNew4->title }}</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Người tạo</a> on <a href="#" class="post-date">{{ $rowExamNew2->created_at }}</a></p>
										</div>
									</div>

								</div>
								@endforeach
								<!-- Single Blog Post -->

							</div>
							
							
								
						</div>
					</div>

					<div class="tab-pane fade" id="world-tab-2" role="tabpanel" aria-labelledby="tab2">
						<div class="row">
							<div class="col-12 col-md-6">
								@foreach($exam_new_user_1 as $rowExamNew1)
								<!-- Single Blog Post -->
								<div class="single-blog-post">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b1.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">New</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
												<h5>Đề :{{ $rowExamNew1->title }}</h5>
											</a>
											<small>Số câu hỏi : {{ $rowExamNew1->number_question }}</small>
											<h6>Thời gian làm : {{ $rowExamNew1->time_to_do }} Phút</h6>
											<h6>độ khó : {{ $rowExamNew1->level_of_exam }} </h6>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Người tạo</a> on <a href="#" class="post-date">{{ $rowExamNew1->created_at }}</a></p>
										</div>
									</div>
								</div>
								@endforeach
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								@foreach($exam_new_user_4 as $rowExamUserNew4)
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b10.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>{{ $rowExamUserNew4->title }}</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Người tạo</a> on <a href="#" class="post-date">{{ $rowExamUserNew4->created_at }}</a></p>
										</div>
									</div>
								</div>
								@endforeach


							</div>
						</div>
					</div>

				{{-- 	<div class="tab-pane fade" id="world-tab-3" role="tabpanel" aria-labelledby="tab3">
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b1.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b10.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>

								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b11.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>

								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b12.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>

								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b13.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="world-tab-4" role="tabpanel" aria-labelledby="tab4"EW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b10.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>

								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b11.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>

								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b12.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>

								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b13.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}}


				</div>
			</div>

			<!-- Catagory Area -->
			<div class="world-catagory-area mt-50">
				<ul class="nav nav-tabs" id="myTab2" role="tablist">
					<li class="title">Thông báo cái gì đó tại trường</li>

					<li class="nav-item">
						<a class="nav-link active" id="tab10" data-toggle="tab" href="#world-tab-10" role="tab" aria-controls="world-tab-10" aria-selected="true">ALL</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="tab11" data-toggle="tab" href="#world-tab-11" role="tab" aria-controls="world-tab-11" aria-selected="false">Lớp 10</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="tab12" data-toggle="tab" href="#world-tab-12" role="tab" aria-controls="world-tab-12" aria-selected="false">Lớp 11</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="tab13" data-toggle="tab" href="#world-tab-13" role="tab" aria-controls="world-tab-13" aria-selected="false">Lớp 12</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" id="tab14" data-toggle="tab" href="#world-tab-14" role="tab" aria-controls="world-tab-14" aria-selected="false">Khác</a>
					</li>

				</ul>

				<div class="tab-content" id="myTabContent2">

					<div class="tab-pane fade show active" id="world-tab-10" role="tabpanel" aria-labelledby="tab10">
						<div class="row">

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b2.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>AAAA?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...VVVVVVVV</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.3s">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b3.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>BBBBB</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="world-catagory-slider2 owl-carousel wow fadeInUpBig" data-wow-delay="0.4s">
									<!-- ========= Single Catagory Slide ========= -->
									<div class="single-cata-slide">
										<div class="row">
											<div class="col-12 col-md-6">
												<!-- Single Blog Post -->
												<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
													<!-- Post Thumbnail -->
													<div class="post-thumbnail">
														<img src="img/blog-img/b14.jpg" alt="">
													</div>
													<!-- Post Content -->
													<div class="post-content">
														<a href="#" class="headline">
															<h5>CCCt</h5>
														</a>
														<!-- Post Meta -->
														<div class="post-meta">
															<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<!-- Single Blog Post -->
												<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
													<!-- Post Thumbnail -->
													<div class="post-thumbnail">
														<img src="img/blog-img/b15.jpg" alt="">
													</div>
													<!-- Post Content -->
													<div class="post-content">
														<a href="#" class="headline">
															<h5>HE</h5>
														</a>
														<!-- Post Meta -->
														<div class="post-meta">
															<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<!-- Single Blog Post -->
												<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
													<!-- Post Thumbnail -->
													<div class="post-thumbnail">
														<img src="img/blog-img/b16.jpg" alt="">
													</div>
													<!-- Post Content -->
													<div class="post-content">
														<a href="#" class="headline">
															<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
														</a>
														<!-- Post Meta -->
														<div class="post-meta">
															<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<!-- Single Blog Post -->
												<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
													<!-- Post Thumbnail -->
													<div class="post-thumbnail">
														<img src="img/blog-img/b17.jpg" alt="">
													</div>
													<!-- Post Content -->
													<div class="post-content">
														<a href="#" class="headline">
															<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
														</a>
														<!-- Post Meta -->
														<div class="post-meta">
															<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- ========= Single Catagory Slide ========= -->
									<div class="single-cata-slide">
										<div class="row">
											<div class="col-12 col-md-6">
												<!-- Single Blog Post -->
												<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
													<!-- Post Thumbnail -->
													<div class="post-thumbnail">
														<img src="img/blog-img/b17.jpg" alt="">
													</div>
													<!-- Post Content -->
													<div class="post-content">
														<a href="#" class="headline">
															<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
														</a>
														<!-- Post Meta -->
														<div class="post-meta">
															<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<!-- Single Blog Post -->
												<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
													<!-- Post Thumbnail -->
													<div class="post-thumbnail">
														<img src="img/blog-img/b15.jpg" alt="">
													</div>
													<!-- Post Content -->
													<div class="post-content">
														<a href="#" class="headline">
															<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
														</a>
														<!-- Post Meta -->
														<div class="post-meta">
															<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<!-- Single Blog Post -->
												<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
													<!-- Post Thumbnail -->
													<div class="post-thumbnail">
														<img src="img/blog-img/b14.jpg" alt="">
													</div>
													<!-- Post Content -->
													<div class="post-content">
														<a href="#" class="headline">
															<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
														</a>
														<!-- Post Meta -->
														<div class="post-meta">
															<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<!-- Single Blog Post -->
												<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
													<!-- Post Thumbnail -->
													<div class="post-thumbnail">
														<img src="img/blog-img/b16.jpg" alt="">
													</div>
													<!-- Post Content -->
													<div class="post-content">
														<a href="#" class="headline">
															<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
														</a>
														<!-- Post Meta -->
														<div class="post-meta">
															<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="world-tab-11" role="tabpanel" aria-labelledby="tab11">
						<div class="row">

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b2.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b3.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b14.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b15.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b16.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b17.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="world-tab-12" role="tabpanel" aria-labelledby="tab12">
						<div class="row">

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b2.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b3.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b2.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b3.jpg" alt="">
										<!-- Catagory -->
										<div class="post-cta"><a href="#">NEW</a></div>
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
										</a>
										<p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="world-tab-13" role="tabpanel" aria-labelledby="tab13">
						<div class="row">

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b14.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b15.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b16.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b17.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b14.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b15.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b16.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b17.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="world-tab-14" role="tabpanel" aria-labelledby="tab14">
						<div class="row">

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b14.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b15.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b16.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b17.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b14.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b15.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b16.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Single Blog Post -->
								<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
									<!-- Post Thumbnail -->
									<div class="post-thumbnail">
										<img src="img/blog-img/b17.jpg" alt="">
									</div>
									<!-- Post Content -->
									<div class="post-content">
										<a href="#" class="headline">
											<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
										</a>
										<!-- Post Meta -->
										<div class="post-meta">
											<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<!-- ========== Sidebar Area ========== -->
	<div class="col-12 col-md-8 col-lg-4">
		<div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
			<!-- Widget Area -->
			<div class="sidebar-widget-area">
				<h5 class="title">Xếp hạng cá nhận</h5>
				<div class="widget-content">
					<p>10 người :</p>
					<p>Số điểm 10 đạt được khi làm đề thi Xếp hạng</p>
				</div>
			</div>
			<!-- Widget Area -->
			<div class="sidebar-widget-area">
				<h5 class="title">Top Điểm 10</h5>
	
			@foreach($user_show_detail_top as $rowDetai_Top_User)
				<div class="widget-content">
					<!-- Single Blog Post -->
					<div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
						<!-- Post Thumbnail -->
						<div class="post-thumbnail">
							@if(!empty(($rowDetai_Top_User['hinh'])))
							<img src="img/{{ $rowDetai_Top_User['hinh'] }}" alt="">
							@else

							<img src="img/blog-img/b2.jpg" alt="">
							@endif
						</div>
						<!-- Post Content -->
						<div class="post-content">
							<a href="#" class="headline">
								<h5 class="mb-0">{{ $rowDetai_Top_User['name'] }}</h5>
								<h5 class="mb-0">Có  {{ $rowDetai_Top_User['score'] }} Điểm 10</h5>
							</a>
						</div>
					</div>
					<!-- Single Blog Post -->
				</div>
				
			@endforeach

			</div>


			<div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
				<!-- Widget Area -->
				<div class="sidebar-widget-area">
					<h5 class="title">Xếp hạng đề thi</h5>
					<div class="widget-content">
						<p>10 đề :</p>
						<p>có số người làm nhiều nhất</p>
					</div>
				</div>
				<!-- Widget Area -->
				<div class="sidebar-widget-area">
					<h5 class="title">Top đề thi</h5>
					<div class="widget-content">
						<!-- Single Blog Post -->
						<div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
							<!-- Post Thumbnail -->
							<div class="post-thumbnail">
								<img src="img/blog-img/b10.jpg" alt="">
							</div>
							<!-- Post Content -->
							<div class="post-content">
								<a href="#" class="headline">
									<h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
								</a>
							</div>
						</div>
						<!-- Single Blog Post -->
						<div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
							<!-- Post Thumbnail -->
							<div class="post-thumbnail">
								<img src="img/blog-img/b12.jpg" alt="">
							</div>
							<!-- Post Content -->
							<div class="post-content">
								<a href="#" class="headline">
									<h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Widget Area -->
				<div class="sidebar-widget-area">
					<h5 class="title">Chia sẻ</h5>
					<div class="widget-content">
						<div class="social-area d-flex justify-content-between">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
							<a href="#"><i class="fa fa-vimeo"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-google"></i></a>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<!-- ========== Single Blog Post ========== -->
		<div class="col-12 col-md-6 col-lg-4">
			<div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">
				<!-- Post Thumbnail -->
				<div class="post-thumbnail">
					<img src="img/blog-img/b4.jpg" alt="">
					<!-- Post Content -->
					<div class="post-content d-flex align-items-center justify-content-between">
						<!-- Catagory -->
						<div class="post-tag"><a href="friend.php">Bạn bè</a></div>
						<!-- Headline -->
						<a href="#" class="headline">
							<h5>Vào thi đề của bạn của bạn !</h5>
						</a>
						<!-- Post Meta -->
						<div class="post-meta">
							<p><a href="#" class="post-author">HELLO</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ========== Single Blog Post ========== -->
		<div class="col-12 col-md-6 col-lg-4">
			<div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.4s">
				<!-- Post Thumbnail -->
				<div class="post-thumbnail">
					<img src="img/blog-img/b5.jpg" alt="">
					<!-- Post Content -->
					<div class="post-content d-flex align-items-center justify-content-between">
						<!-- Catagory -->
						<div class="post-tag"><a href="nguoidung">Thi xếp hạng</a></div>
						<!-- Headline -->
						<a href="nguoidung" class="headline">
							<h5>Giành tốp 1 khoe với bạn bè nào</h5>
						</a>
						<!-- Post Meta -->
						<div class="post-meta">
							<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ========== Single Blog Post ========== -->
		<div class="col-12 col-md-6 col-lg-4">
			<div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.6s">
				<!-- Post Thumbnail -->
				<div class="post-thumbnail">
					<img src="img/blog-img/b6.jpg" alt="">
					<!-- Post Content -->
					<div class="post-content d-flex align-items-center justify-content-between">
						<!-- Catagory -->
						<div class="post-tag"><a href="profile.php">Tạo đề thi</a></div>
						<!-- Headline -->
						<a href="#" class="headline">
							<h5>Tạo đề thách thức bạn bè và chia sẻ kiến thức </h5>
						</a>
						<!-- Post Meta -->
						<div class="post-meta">
							<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="world-latest-articles">
		<div class="row">
			<div class="col-12 col-lg-8">
				<div class="title">
					<h5>Lướt tin tức</h5>
				</div>

				<!-- Single Blog Post -->
				<div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
					<!-- Post Thumbnail -->
					<div class="post-thumbnail">
						<img src="img/blog-img/b18.jpg" alt="">
					</div>
					<!-- Post Content -->
					<div class="post-content">
						<a href="#" class="headline">
							<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
						</a>
						<p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
						<!-- Post Meta -->
						<div class="post-meta">
							<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
						</div>
					</div>
				</div>

				<!-- Single Blog Post -->
				<div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
					<!-- Post Thumbnail -->
					<div class="post-thumbnail">
						<img src="img/blog-img/b19.jpg" alt="">
					</div>
					<!-- Post Content -->
					<div class="post-content">
						<a href="#" class="headline">
							<h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
						</a>
						<p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
						<!-- Post Meta -->
						<div class="post-meta">
							<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
						</div>
					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4">
				<div class="title">
					<h5>Lướt Video tin tức</h5>
				</div>

				<!-- Single Blog Post -->
				<div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
					<!-- Post Thumbnail -->
					<div class="post-thumbnail">
						<img src="img/blog-img/b7.jpg" alt="">
						<!-- Catagory -->
						<div class="post-cta"><a href="#">Video</a></div>
						<!-- Video Button -->
						<a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a>
					</div>
					<!-- Post Content -->
					<div class="post-content">
						<a href="#" class="headline">
							<h5>Ten</h5>
						</a>
						<p>Nội dung</p>
						<!-- Post Meta -->
						<div class="post-meta">
							<p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
						</div>
					</div>
				</div>

    @include('logout')

			</div>
		</div>
	</div>

	<!-- Load More btn -->
	<div class="row">
		<div class="col-12">
			<div class="load-more-btn mt-50 text-center">
				<a href="#" class="btn world-btn">Xem Tiếp</a>
			</div>
		</div>
	</div>
</div>
</div>

@endsection