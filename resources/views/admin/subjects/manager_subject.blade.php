@extends('admin.masteradmin')


@section('content')
  

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <h4><a class="text-success text-center" href="admin/trangchu">Trang Chủ </a>/ Môn {{ $name_subject }}</h4>
            <h4><a class="text-success text-center" href="admin/trangchu">Thêm Chương </a></h4>
          </li>
        </ol>
          @php  
          $i=0;
          @endphp

        @foreach($list_matrix as $rowListMatrix)
          @php  
          $i++;
          @endphp
  
        <p>
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample{{  $i }}" role="button" aria-expanded="false" aria-controls="collapseExample{{  $i }}">
            Chương : {{ $rowListMatrix['chapter_name'] }}
          </a>

        </p>
        <div class="collapse" id="collapseExample{{  $i }}">

          <div class="row">


          @foreach($rowListMatrix['chapter_item'] as $rowListItem)


          <div class="col-xl-5 col-sm-4 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#logoutModal{{ $rowListItem['matrix_id'] }}" >
                <span class="float-left">Click : {{ $rowListItem['item_name'] }}</span>
                <span class="float-right">
                  <i class="fas fa-angle-delete"></i>
                </span>
              </a>
            </div>  
          </div>
        
{{-- href="admin/cauhoi/{{ $rowListItem['matrix_id'] }}" --}}
         <div class="modal fade" id="logoutModal{{ $rowListItem['matrix_id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn !</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"> * Nội dung : {{ $rowListItem['item_name'] }} </div>
                  <div class="modal-body">Nếu muốn thêm mục Cho (*) :<a href=""> Click Vào Đầy </a></div>
                  <div class="modal-footer">
                    <a class="btn btn-primary" href="admin/suacauhoi/">Sửa </a>
                    <a class="btn btn-danger" href="admin/xoacauhoi/">Xóa</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                  </div>
                </div>
              </div>
            </div>


          @endforeach
        </div>

      </div>

      @endforeach
 @endsection