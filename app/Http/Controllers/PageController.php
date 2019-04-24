<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectsModel;
use App\MatrixsModel;
use App\ClassesModel;
use App\QuestionsModel;
use App\ExamsModel;
use App\QuestionModel;
use App\QuestionAndExamModel;
use App\ScoresModel;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;


// thu vien tach in random other
// use Illuminate\Support\collection;

class PageController extends Controller
{



    // chuyen huong trang chu
	public function getTrangChu()
	{
		//de thi moi
		$exam_new_2 = ExamsModel::where('status_exam',0)->orderBy('created_at','DESC')->limit(3)->get();
		$exam_new_4 = ExamsModel::where('status_exam',0)->orderBy('created_at','DESC')->offset(3)->limit(4)->get();
		
		//de thi nguoi dung moi
		$exam_new_user_1 = ExamsModel::where('status_exam',1)->orderBy('created_at','DESC')->limit(1)->get();
		$exam_new_user_4 = ExamsModel::where('status_exam',1)->orderBy('created_at','DESC')->offset(1)->limit(4)->get();
		
		//diem nguoi dung
		$score_top = DB::select('select id_user, count(*) as diem10 from scores where answer_number = exam_number group by id_user ORDER BY diem10 DESC limit 0,10');

		//lay danh sach user  top
		$user_id_top = array();
		$user_show_detail_top = array();
		
		//bo vao mang trung gian
		foreach ($score_top as $rowScore) 
		{	
			$user_id_top[] = $rowScore->id_user;
		}

		//chi tiet de thi nguoi dung top mang trung gian
		$user_detail_top = User::select('id','name','images')->whereIn('id',$user_id_top)->get(); 

		//gop hert vao mot mang truyen qua view
		foreach ($score_top as $rowScore) 
		{
			foreach ($user_detail_top as $rowDetaiUser)
			{
				if($rowScore->id_user == $rowDetaiUser->id)
				{
					$user_show_detail_top[] = ['id' => $rowDetaiUser->id,'name' => $rowDetaiUser->name,'hinh'=>$rowDetaiUser->images,'score' =>$rowScore->diem10];
				}
			}

		}
		return view('pages.trangchu',compact('user_show_detail_top','exam_new_2','exam_new_4','exam_new_user_1','exam_new_user_4'));
	}

    // chuyen huong trang nguoi dung
	public function getNguoiDung()
	{	
		return view('pages.member.nguoidung');
	}

    // chuyen huong trang non thi
	public function getOnThi()
	{	
		
		$matrix= MatrixsModel::all()->where('status_matrix',0);
		// dd($matrix);
		$class= ClassesModel::all();
		return view('pages.member.onthi',['Matrix'=> $matrix,'Class'=>$class]);
	}

	//on thi theo nhom lop
	public function getOnThiTheoLop($idLop)
	{	
		
		$class_name = ClassesModel::findOrFail($idLop);
		$subject= SubjectsModel::join('matrixs','subjects.id','=','id_subject')
		->where('id_class','=',$idLop)->where('matrixs.status_matrix',0)->get();
		// dd($subject);
		return view('pages.member.onthitheolop',['Subjects' => $subject,'Class_name' => $class_name]);
	}


    // lam bai thi voi id ma tran nhan vao
	public function getLamOnThiNgauNhien($idMatrix)
	{	
		// mang cau hoi
		$questionrandom = QuestionsModel::where('id_matrix',$idMatrix)->where('status_question',0)->take(40)->inRandomOrder()->get();

		//ten truong
		$name_chapter = MatrixsModel::findOrFail($idMatrix);
		// $chunkStudents = $questionrandom->chunk(4); chia câu hỏi	 chumk tách mảng
		

		return view('pages.member.lamonthingaunhien',['QuestionRandom' => $questionrandom,'id_matrix' => $idMatrix,'Name_chapter' =>$name_chapter]);
	}

	//đề ôn thi hệ thông
	public function getThiHeThong($idlop)
	{
		$class = ClassesModel::findOrFail($idlop);
		$exam_class = ExamsModel::where('status_exam',0)->findOrFail($idlop);

		// dd($exam_class);
		return view('pages.member.dethihethong',['Class' => $class,'Exam_class'=>$exam_class]);
		
	}

	//Làm đề ôn thi 
	public function postLamBai(Request $request)
	{	
		// get id exam
		$exam_question = ExamsModel::findOrFail($request->id_dethi);

   		// thonng qua model lay duoc ban trung gian $exam_question->questions

   		//created array trung gian
		$cauHoi = [];



   		//thuc hien lay cau hoi thong qua ban trung gian theo nguyen tac 1-1
   		//$exam_question->questions = $value->question 
		foreach ($exam_question->questions as $value) {
			$cauHoi[] = $value->question;
		}

		//gan voa mang cau hoi
		$exam_question->question = $cauHoi;

   		// $exam_question->question tao thuoc tinh trong mang
		$number_core =number_core(Auth::user()->id,$request->id_dethi);
        
        $scores = new ScoresModel;
        //de thi ma chua di gio han lan thi se duoc thi
        if($exam_question['exam_number'] > count($number_core))
        {

        	$scores = new ScoresModel ;
        	$scores->id_user = Auth::user()->id;
        	$scores->id_exam = $request->id_dethi;
        	$scores->exam_number = count($exam_question->questions);
        	$scores->exam_day = date('Y/m/d H:i:s');
        	$scores->answer_number = 0;
        	$scores->score = 0.0;
        	$scores->save();

		//gan id diem vao de thi
        	$exam_question->score = $scores->id;

		// dd($exam_question);

        	return view('pages.member.lambaithi',['Exam_question' => $exam_question]);
		}
		else
		{
            return redirect('')->with('thongbao','bạn đã làm đủ số lần làm đề thi này điểm đã được lưu');
        }
		
	}

	//cham diem de thi
	// thong tin  bai lam id cau hoi se duoc gui len  gom: gia tri lam bai ket qua lam bai tong so
	public function postKetQuaThi(Request $request)
	{
		// $question = QuestionsModel::where('id_dethi',$request->id_dethi)->get();
		// dd($request['trangthaidethi']);
		//bang trung gian gom nhung cau hoi co de thi id_exam
		$question_and_exam = QuestionAndExamModel::firstOrFail()->where('id_exam',$request->id_dethi)->get();
			// dd($question_and_exam);

		$id_dethi = $request->id_dethi;
		if(isset($_POST['submitchamdiem']))
		{
			$answer = array(); // mang đáp án người dùng đã chọn
			$answer_user = array(); // mang nguoi dung chon
			$right_answer=0;
			$wrong_answer=0;
			$not_answer=0;
			$mumber_question = count($request['traloi']);

			//có  2 trường này 
			if($request['trangthaidethi'] && $request['id_nguoitao'])
				$info_friend_exam = ['status_exam'=>$request['trangthaidethi'],'user_created' => $request['id_nguoitao']];
			else
				$info_friend_exam = null;
			// dd($info_friend_exam);
			

			
			//lay noi dung ban trung gian
			foreach ($question_and_exam as $rowIdQuestion) {
				//lay cau hoi voi dap an dung
				foreach ($rowIdQuestion->question as $rowDetailQuestion) {
					//tao mang dap an
					$answer[] = [$rowDetailQuestion->id,$rowDetailQuestion->answer];
				}	
			}
			// dd($answer);

			// nguoi dung chon noi dung cau hoi o het o mang nay  $request['traloi'] : id cau hoi
			foreach ($request['traloi'] as  $value) 
			{
				//tạo mảng người dùng chọn
					// echo '<br>'.$request[$value]; giá trị người dùng chọn
				array_push($answer_user,[$value,$request[$value]]);
			}

			// dd($answer_user);
			//kiem tra cau hoi da chon  với kết quả đúng thì cộng điểm
			foreach ($answer as $rowAnswer) 
			{	

				foreach ($answer_user as $rowIdQuestionUser) 
				{

					if ( ($rowAnswer[0] == $rowIdQuestionUser[0]) ) 
					{
						if( ($rowAnswer[1] == $rowIdQuestionUser[1]) )
						{
							$right_answer++;
						}
						else if( $rowIdQuestionUser[1] == 5)
						{
							$not_answer++;
						}
						else
							$wrong_answer++;
					}
				}
			}

	        $number_core =number_core(Auth::user()->id,$request->id_dethi);
			
			$scores = ScoresModel::findOrFail($request->id_score);

			//neu diem da co trang thai la 0 tuc la chua thi lan nao duoc phep thi
			if( ($scores->status_user_scores == 0) && ($scores->id == $request->id_score))
			{

				$score = round($right_answer*10/($right_answer+$not_answer+$wrong_answer),2);

				DB::update('update scores set answer_number = ? , score = ? , status_user_scores = ? where id_exam = ? and id_user = ? and id = ? ',
					[$right_answer,$score,1,$request->id_dethi, Auth::user()->id,$request->id_score]);


				return view('pages.member.xemketqua',compact('right_answer','wrong_answer','not_answer','answer','mumber_question','id_dethi','info_friend_exam'));
			}
			else
				return redirect('')->with('thongbao','bạn đã có điểm đề thi này');;

		}


	} 

}
