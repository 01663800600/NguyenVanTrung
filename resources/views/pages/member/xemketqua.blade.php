@extends('mastermember')

@section('content')

{{-- <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- Breadcrumbs-->

@include('layouts/member/submenu')


<style type="text/css">
	/*font Awesome http://fontawesome.io*/
/*Comment List styles*/
.comment-list .row {
  margin-bottom: 0px;
}
.comment-list .panel .panel-heading {
  padding: 4px 15px;
  position: absolute;
  border:none;
  /*Panel-heading border radius*/
  border-top-right-radius:0px;
  top: 1px;
}
.comment-list .panel .panel-heading.right {
  border-right-width: 0px;
  /*Panel-heading border radius*/
  border-top-left-radius:0px;
  right: 16px;
}
.comment-list .panel .panel-heading .panel-body {
  padding-top: 6px;
}
.comment-list figcaption {
  /*For wrapping text in thumbnail*/
  word-wrap: break-word;
}
/* Portrait tablets and medium desktops */
@media (min-width: 768px) {
  .comment-list .arrow:after, .comment-list .arrow:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-color: transparent;
  }
  .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
    border-left: 0;
  }
  /*****Left Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.left:before {
    left: 0px;
    top: 30px;
    /*Use boarder color of panel*/
    border-right-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.left:after {
    left: 1px;
    top: 31px;
    /*Change for different outline color*/
    border-right-color: #FFFFFF;
    border-width: 15px;
  }
  /*****Right Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.right:before {
    right: -16px;
    top: 30px;
    /*Use boarder color of panel*/
    border-left-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.right:after {
    right: -14px;
    top: 31px;
    /*Change for different outline color*/
    border-left-color: #FFFFFF;
    border-width: 15px;
  }
}
.comment-list .comment-post {
  margin-top: 6px;
}	


</style>

<!-- DataTables Example -->
<div class="row" style="margin:auto">

	<div class="col-8 col-md-8">

		<div class="row">
			<label style="margin-right: 1%">Trả lời đúng :</label>
			<div class="col-sm-@if($right_answer ==0)0 @else{{ round($right_answer*10/$mumber_question) }}  @endif bg-success">
				<p>{{ $right_answer }}</p>
			</div>

		</div>
		<div  class="row">
			<label style="margin-right: 3.5%" >Trả lời sai :</label>
			<div class="col-sm-@if($wrong_answer ==0)0 @else{{ round($wrong_answer*10/$mumber_question) }} @endif  bg-danger">
				<p> {{ $wrong_answer }}</p>
			</div>
		</div>
		<div class="row">
			<label>Không trả lời :</label>
			<div class="col-sm-@if($not_answer ==0)0 @else{{ round($not_answer*10/$mumber_question) }} @endif bg-secondary">
				<p>{{ $not_answer }} </p>
			</div>
		</div>
	</div>
	<div style="text-align: center;margin-left: 10px" class="col-3 col-md-3 bg-info text-white" style="">
		<h3> Điểm của bạn </h3>
		<h1>@if($right_answer ==0)0 @else {{ round($right_answer*10/$mumber_question,2) }} @endif</h1>
	</div>
</div>
<hr>
<div class="row">
	<div style="text-align: center;margin:auto" >
	
		{{-- <a href="{{ URL::previous() }}">Nút trở về url trước</a> --}}
		{{-- xem den tu trang nao {{ URL::previous() }}  --}}

		{{-- <input type='hidden' name='next_question[]' value='{{ $answer }}' id='traloi'> --}}
		
		@php
		$next_question= array();
		$next_question =$answer;
		@endphp


			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="id_dethi" value="{{ $id_dethi }}">

			@if($info_friend_exam['user_created'] && $info_friend_exam['status_exam'] !=0) 
			<a type="button" class="btn btn-primary" href="list-friend-exam/friend=8F{{ $info_friend_exam['user_created'] }}41T">làm đề thi khác của bạn bè</a>
			@else
			<a type="button" class="btn btn-primary" href="nguoidung">làm đề thi khác của bạn</a>
			@endif
			<a  type="button" class="btn btn-primary" href=" ">đánh giá đề thi</a>
			<a  type="button" class="btn btn-primary" href=" ">trang chủ</a>

	</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2 class="page-header">Đánh giá đề thi</h2>
        <section class="comment-list">
          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </article>
        </section>
    </div>
  </div>
</div>


@endsection

