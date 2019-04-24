@extends('master')

@section('content')
    {{-- <script type="text/javascript" language="javascript" src="js/ckeditor.js" ></script> --}}

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Câu hỏi 
                    <small>Thêm</small>
                    <a href="profile-question/{{ $id_matrix }}" class="text-danger">/ Trở về</a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom:120px">

                @if(count($errors)>0)

                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{ $err }} <br>
                    @endforeach
                </div>

                @endif

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
                @endif

                @if(session('LoiHinh'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
                @endif
               {{-- enctype="multipart/form-data" có mới úp đươc hình --}}
                <form action="profile-created-question" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>Nội Dung câu hỏi</label>
                        {{-- <textarea id="demo" class="ckeditor"></textarea> --}}
                        <textarea  id="demo" class="form-control ckeditor" rows="2" name="noidungcauhoi"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Câu hỏi 1</label>
                        {{-- <textarea id="demo" class="ckeditor"></textarea> --}}
                        <textarea  id="demo" class="form-control ckeditor" rows="1" name="cauhoi1"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Câu hỏi 2</label>
                        {{-- <textarea id="demo" class="ckeditor"></textarea> --}}
                        <textarea  id="demo" class="form-control ckeditor" rows="1" name="cauhoi2"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Câu hỏi 3</label>
                        {{-- <textarea id="demo" class="ckeditor"></textarea> --}}
                        <textarea  id="demo" class="form-control ckeditor" rows="1" name="cauhoi3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Câu hỏi 4</label>
                        {{-- <textarea id="demo" class="ckeditor"></textarea> --}}
                        <textarea  id="demo" class="form-control ckeditor" rows="1" name="cauhoi4"></textarea>
                    </div>
 {{-- Răng buộc 2 2 lựa chọ sử dung ajax dưới cùng--}}
                    <div class="form-group">
                        <label>Đáp án đúng</label>
                        <select class="form-control" name="dapan">


                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>

                        </select>
                    </div>                    
                    <div class="form-group">
                        <label>độ khó câu hỏi</label>
                        <select class="form-control" name="dokho">

							<option value="7">Hơi khó</option>
							<option value="10">Cực khó</option>
                            <option value="5">trung bình</option>
                            <option value="3">khá dễ</option>
                            <option value="1">Cực dễ</option>
                            

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chế độ : </label>
                        <label class="radio-inline">
                            <input name="trangthai" value="1" checked="" type="radio">công khai
                        </label>
                        <label class="radio-inline">
                            <input name="trangthai" value="2" type="radio">Bạn bè
                        </label>
                        <label class="radio-inline">
                            <input name="trangthai" value="3" type="radio">Riêng tư
                        </label>
                    </div>
                    <input type="hidden" name="id_matrix" value="{{ $id_matrix }}">
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm MỚi</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection
        {{-- chuyền qua index  khi chon bắt sự kiện và đưa sang thể loại--}}
