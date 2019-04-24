@extends('admin.masteradmin')


@section('content')

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <h4 class="text-center ">  Môn Học đang  quản lý</h4>
          </li>
        </ol>
        @php  
          $i=0;
        @endphp

        @foreach($list_class as $rowClass)
          @php  
          $i++;
          @endphp
        <p>
            
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample{{  $i }}" role="button" aria-expanded="false" aria-controls="collapseExample{{  $i }}">
            {{ $rowClass['class_name'] }}
          </a>

        </p>
        <div class="collapse" id="collapseExample{{  $i }}">

          <div class="row">
           @foreach($rowClass['subjects'] as $sj)
           <div class="col-xl-2 col-sm-4 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <a class="card-footer text-white clearfix small z-1" href="admin/monhoc/{{ $sj['subject_id'] }}">
                <span class="float-left">{{ $sj['subject_name'] }}</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          @endforeach
        </div>

      </div>

      @endforeach
    
{{-- <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    </div>
  </div>
</div> --}}

 @endsection