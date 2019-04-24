@extends('mastermember')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="">Trang Chủ</a>
	</li>
	<li class="breadcrumb-item active"><a href="nguoidung">Về Trang Đầu</a></li>
	
</ol>
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
	Chọn mục muốn Thi </div>
	<hr>
	@include('layouts/member/header_class')
	<hr>
</div>

@endsection
