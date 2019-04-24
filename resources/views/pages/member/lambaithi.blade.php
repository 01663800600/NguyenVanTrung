@extends('mastermember')

@section('content')



<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"> Mã đề thi Đề thi : {{ $Exam_question->id }}</i>
		{{-- {{ $Name_chapter->chapter }} : {{ $Name_chapter->chapter_item }} --}}
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

				@php	
				$i=0;

				$traloi= array();

				@endphp
				

				@foreach($Exam_question->question as $rowQuestion)
				@php	
				$i++;
				@endphp

				<form method='post' id='quiz_form' action="ketquathi">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row mb-4">
						<div class="col-md-12 question-title-box">
							<a id="cauhoi_{{ $rowQuestion[0]->id }}" class="btn btn-primary btn-title" data-toggle="collapse" href="#question_{{ $rowQuestion[0]->id }}" role="radio" aria-expanded="false" aria-controls="question_{{ $rowQuestion[0]->id }}">Câu {{ $i }}: </a>

							<radio class="btn btn-primary" type="radio" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="question_{{ $rowQuestion[0]->id }}">Hiển thị tất cả</radio>
						</div>
						<div class="col">
							<div class="collapse multi-collapse" id="question_{{ $rowQuestion[0]->id }}">
								<div class="card card-body">
									{{ $rowQuestion[0]->content_question }} // {{ $rowQuestion[0]->id }}
								</div>
							</div>
						</div>
						<div class="col">
							<div class="collapse multi-collapse" id="question_{{ $rowQuestion[0]->id }}">
								<div class="card card-body">
									<div class='align'>
										<input class="answer" type="radio" value="1"  id='radio1_{{ $rowQuestion[0]->id }}' name='{{ $rowQuestion[0]->id }}'>
										<label id='ans1_{{ $rowQuestion[0]->id }}' for='1'>{{ $rowQuestion[0]->question_a }}</label>
										<br/>
										<input class="answer" type="radio" value="2" id='radio2_{{ $rowQuestion[0]->id }}' name='{{ $rowQuestion[0]->id }}'>
										<label id='ans2_{{ $rowQuestion[0]->id }}' for='1'>{{ $rowQuestion[0]->question_b }}</label>
										<br/>
										<input class="answer" type="radio" value="3" id='radio3_{{ $rowQuestion[0]->id }}' name='{{ $rowQuestion[0]->id }}'>
										<label id='ans3_{{ $rowQuestion[0]->id }}' for='1'>{{ $rowQuestion[0]->question_c }}</label>
										<br/>
										<input class="answer" type="radio" value="4" id='radio4_{{ $rowQuestion[0]->id }}' name='{{ $rowQuestion[0]->id }}'>
										<label id='ans4_{{ $rowQuestion[0]->id }}' for='1'>{{ $rowQuestion[0]->question_d }}</label>
										<input class="answer" type="radio" checked='checked' value="5" style='display:none' id='radio5_{{ $rowQuestion[0]->id }}' name='{{ $rowQuestion[0]->id }}'>
										<div id="question_{{ $rowQuestion[0]->id }}" class='questions'>
											<h2 id="question_{{ $rowQuestion[0]->id }}"></h2>

											<br/>


											<input type='hidden' name='traloi[]' value='{{ $rowQuestion[0]->id }}' id='traloi'>

										</div>
									</div>


								</div>
							</div>
						</div>
					</div>
        @endforeach	
        <input type='hidden' name='id_dethi' value='{{ $Exam_question->id }}' id='count'>
        <input type='hidden' name='trangthaidethi' value='{{ $Exam_question->status_exam }}' >
        <input type='hidden' name='id_nguoitao' value='{{ $Exam_question->id_user }}' >
        <input type='hidden' name='id_score' value='{{ $Exam_question->score }}' id='score'>

        <input type="submit" class="btn btn-danger" style="text-align:center;" value="Nộp Bài" name="submitchamdiem" id='{{ $rowQuestion[0]->id }}'>

    </form>	

</table>
</div>
</div>


<div id="count-down" class="demo" style="text-align:center;font-size: 25px;"></div>

<div class="card-footer small text-muted">Ngày Làm đề thi</div>
<script>
    //Jquery catch event on click input has class answer
    $(document).on('click', 'input.answer', function(event) {
    	let answer = $(this);
    	let btn_title = answer.parents('div.row').children('div.question-title-box').children('a.btn-title');

    	if (btn_title.hasClass('bg-red') == false) {
    		btn_title.addClass('bg-red');
    	}
    });

    $(document).ready(function() {
    	let limit = {{ $Exam_question->time_to_do }}; // tuong duong 60p, em truyen so phut vao day
    	let time = limit * 1000 * 60;
    	let countDownBox = $('div#count-down');
    	let x = setInterval(function() {
    		time -= 1000;

    		let hours = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    		let minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
    		let seconds = Math.floor((time % (1000 * 60)) / 1000);

    		countDownBox.html(hours + ':' + minutes + ':' + seconds);
    		
    		if (time < 0) {
    			clearInterval(x);
    			countDownBox.html('Hết thời gian làm bài');
    			$('form#quiz_form').submit();
    		}


    	}, 1000);
    });

</script>



	
	<!-- <script>
		$(document).ready(function(){
			$('#demo1').stopwatch().stopwatch('start');
			var steps = $('form').find(".questions");
			var count = steps.size();
			steps.each(function(i){
				hider=i+2;
				if (i == 0) {   
					$("#question_" + hider).hide();
					createNextradio(i);
				}
				else if(count==i+1){
					var step=i + 1;
            //$("#next"+step).attr('type','submit');
            $("#next"+step).on('click',function(){

            	submit();

            });
        }
        else{
        	$("#question_" + hider).hide();
        	createNextradio(i);
        }

    });
			function submit(){
				$.ajax({
					type: "POST",
					url: "ajax.php",
					data: $('form').serialize(),
					success: function(msg) {
						$("#quiz_form,#demo1").addClass("hide");
						$('#result').show();
						$('#result').append(msg);
					}
				});

			}
			function createNextradio(i)
			var step = i + 1;
				var step1 = i + 2;
				$('#next'+step).on('click',function(){
					$("#question_" + step).hide();
					$("#question_" + step1).show();
				});
			}
			setTimeout(function() {
				submit();
			}, 50000);
		});
	</script> --> 
	@endsection


