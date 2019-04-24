@extends('master')

@section('css')

<link rel="stylesheet" href="list_friend.css">


@endsection
@section('content')



   
<div class="container">


<hr>

   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 text-center">
         <ol>
            <li>Danh sách bạn bè</li>

         </ol>
      </div>
   </div>
   <hr>
     @if(session('thongbao'))
          <script type="text/javascript"> alert("{{ session('thongbao') }}") </script>
        @endif 
    <div class="row clearfix">
      @foreach($my_friend as $rowMyfriend)
        <div class="col-lg-2 col-md-4 col-sm-6 ">
            <div class="card product_item">
                <div class="body img-thumbnail">
                    <div class="cp_img bg-success ">
                        <img src="img/{{ $rowMyfriend['images'] }}" alt="Product" class="img-thumbnail rounded mx-auto d-block">
                        <div class="hover">
                            <a  class="btn btn-primary btn-sm waves-effect" href="friend/id=10000{{ $rowMyfriend['id_user'] }}">Xem</a>
                            <a data-toggle="modal" data-target="#logoutModal{{ $rowMyfriend['id_user'] }}a" class="btn btn-danger btn-sm waves-effect text-white" >Xóa</a>
                        </div>
                    </div>
                    <div class="product_details">
                        <h5><a href="ec-product-detail.html"><small>{{ $rowMyfriend['full_name'].$rowMyfriend['name'] }}</small></a></h5>
                        <ul class="product_price list-unstyled">
                            <li class="old_price"><small>Gender :
                              @if($rowMyfriend['gender']==0)
                              Nam
                              @elseif($rowMyfriend['gender']==1)
                              Nữ
                              @else
                              Khác
                              @endif
                            </small></li>
                            <li class="new_price"><small>Tuổi :{{ $rowMyfriend['ago']}} </small></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

         <div class="modal fade" id="logoutModal{{ $rowMyfriend['id_user'] }}a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Thông báo !</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                              </button>
                           </div>
                           <div class="modal-body">Bạn có chắc chắn xóa : {{ $rowMyfriend['full_name'].$rowMyfriend['name'] }} </div>
                           <div class="modal-footer">
                              <a class="btn btn-danger" href="question-deleteư">Hủy kết bạn</a>
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                           </div>
                        </div>
                     </div>
                  </div>
                       
      @endforeach

      
    </div>
 <div style="display: block; margin: 0 auto;" class="text-center">
               {{ $my_friend->links() }}  
     </div>
    <hr>
   
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 text-center">
         <ol>
            <li>Lời mời kết bạn Mới nhất</li>
         </ol>
      </div>
   </div> 
<hr>
   <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="people-nearby">
       <div class="nearby-user">
        <div class="row">
           @foreach($my_waring_friend as $rowMyWaringfriend)
           <div class="col-md-2 col-sm-2 col-lg-3">
             <img src="img/{{ $rowMyWaringfriend['images'] }}" alt="user" class="profile-photo-lg">
          </div>
          <div class="col-md-3 col-sm-3 col-lg-7">
             <h5><a href="#" class="profile-link card">{{$rowMyWaringfriend['full_name'].$rowMyWaringfriend['name'] }}</a></h5>
             <p>Gender :
                              @if($rowMyWaringfriend['gender']==0)
                              Nam
                              @elseif($rowMyWaringfriend['gender']==1)
                              Nữ
                              @else
                              Khác
                              @endif</p>
             <p class="text-muted">Tuổi :{{ $rowMyWaringfriend['ago']}}</p>
          </div>
          <div class="col-md-1 col-sm-1 col-lg-2">
             <a class="btn btn-success pull-right" href="" >Add</a>
             <a class="btn btn-danger pull-right"  href="">Xóa</a>
          </div> 
          
          @endforeach
       </div>
    </div>
 </div>
</div>
</div>   
        


</div>


@endsection