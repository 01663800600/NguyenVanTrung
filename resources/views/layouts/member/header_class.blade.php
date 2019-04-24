<!-- Icon Cards-->
<div class="row">

	@foreach($Class as $rowClass)
	@if(count($rowClass->subject))
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-success o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa fa-bicycle"></i>
				</div>
				<div class="mr-5">Đề thi {{ $rowClass->class_name }} !</div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="thihethong/{{ $rowClass->id }}">
				<span class="float-left">Vào Làm Bài</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
			</a>
		</div>
	</div>
	@endif
	@endforeach


</div>