<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FriendsModel;
use App\ExamsModel;
use App\ScoresModel;
use App\QuestionsModel;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    //lay du lieu ban be
    public function getFriend()
    {
    	$my_friend = FriendsModel::join('users','users.id','=','friends.id_friend')
    	->join('user_info','user_info.id_user','=', 'friends.id_friend' )
    	->where('friends.id_user','=', Auth::user()->id )->whereIn('status_friend',[1])->select('users.name','friends.created_friend','friends.status_friend','user_info.*')->orderBy('friends.created_friend', 'desc')->paginate(30);

    	$my_waring_friend = FriendsModel::join('users','users.id','=','friends.id_friend')
    	->join('user_info','user_info.id_user','=', 'friends.id_friend' )
    	->where('friends.id_user','=', Auth::user()->id )->whereIn('status_friend',[0])->select('users.name','friends.status_friend','user_info.*')->take(10)->orderBy('friends.created_friend', 'desc')->get();
    	// dd($my_friend);
    	// ->orderBy('R.cr_id', 'asc')
    	return view('pages.memberfiend.friend_list',compact('my_friend','my_waring_friend'));
    }

    // lay thong tin ban be
    public function getUserFriend($iduserfriend)
    {	
    	
        $show_exam_by = show_exam_by($iduserfriend);

        $info_friend = info_friend($iduserfriend);

       $list_matrix = manager_parent_lv3($iduserfriend);

       // $mutual_friend = mutual_friend($iduserfriend);

       // dd($list_matrix);

    	return view('pages.memberfiend.profile_friend',compact('list_matrix','info_friend','show_exam_by'));
    }

    //lay cau hoi cua ban be lam bai thi trac nghiem on thi
    public function getFriendQuestion($iduserfriend,$idmatrixfriend)
    {   
        $info_friend = info_friend($iduserfriend);

        // dd($info_friend);
        // la ban be xem duoc 2 che do
        if ($info_friend['status_friend'] == 1 ) 
        {
          // mang cau hoi
          $QuestionRandom  = QuestionsModel::where('id_matrix',$idmatrixfriend)->whereIn('status_question',[1,2])->take(40)->inRandomOrder()->get();

        } 
        //khong phai ban be xem duoc 1 che do 0
        elseif ($info_friend['status_friend'] == 0 ) 
        {
             $QuestionRandom  = QuestionsModel::where('id_matrix',$idmatrixfriend)->where('status_question',1)->take(40)->inRandomOrder()->get();
             echo "<script type='text/javascript'>";
             echo "alert('Bạn chưa kết bạn chỉ có thể xem nội dung công khai');";
             echo "</script>";

        }
        else 
        {
            echo "<script type='text/javascript'>";
             echo "alert('Đang trong danh sách chặn không có gì cả');";
             echo "</script>";
             $QuestionRandom=[];
        }
        
       

        $name_chapter = get_name_chapter($idmatrixfriend);

        // dd($QuestionRandom);
        return view('pages.memberfiend.question_firend',compact('info_friend','QuestionRandom','name_chapter','idmatrixfriend'));

    }

    //lay danh sach cau hoi va dap an ban be muon xem
    function getListFriendQuestion($iduserfriend,$idmatrixfriend)
    {
         $info_friend = info_friend($iduserfriend);

        // dd($info_friend);
        // la ban be xem duoc 2 che do
        if ($info_friend['status_friend'] == 1 ) 
        {
          // mang cau hoi
          $QuestionRandom  = QuestionsModel::where('id_matrix',$idmatrixfriend)->whereIn('status_question',[1,2])->take(40)->inRandomOrder()->get();
        } 
        //khong phai ban be xem duoc 1 che do 0
        elseif ($info_friend['status_friend'] == 0 ) 
        {
             $QuestionRandom  = QuestionsModel::where('id_matrix',$idmatrixfriend)->where('status_question',1)->take(40)->inRandomOrder()->get();
             echo "<script type='text/javascript'>";
             echo "alert('Bạn chưa kết bạn chỉ có thể xem nội dung công khai');";
             echo "</script>";

        }
        else 
        {
            echo "<script type='text/javascript'>";
             echo "alert('Đang trong danh sách chặn không có gì cả');";
             echo "</script>";
             $QuestionRandom=[];
        }
        
        $name_chapter = get_name_chapter($idmatrixfriend);

        // dd($info_friend);

        return view('pages.memberfiend.question_list_friend',compact('info_friend','QuestionRandom','name_chapter','idmatrixfriend'));

    }

    //lay danh sach de thi ban be
    public function getListFriendExam($iduserfriend)
    {
        //lay thong tin thi
        $info_friend = info_friend($iduserfriend);

        $show_exam_by = show_exam_by($iduserfriend,$info_friend['status_friend']);

        $info_exam_name = info_exam_name( $show_exam_by);

        // dd($show_exam_by,$info_exam_name,$info_friend);

        return view('pages.memberfiend.exam_friend',compact('info_friend','info_exam_name'));

    }

    //cham diem de thi 
    public function postLamBaiBanBe(Request $request)
    {
        // dd($request);

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

        $exam_question->question = $cauHoi;
        if(count($exam_question->question)==0)
        {
            
                 return redirect('friend/id=10000'.$request->id_user_friend)->with('thongbao','Đề thi này đã bị xóa vì  không có câu hỏi vui lòng chọn đề thi khác');
        }
        else
        {
        // $exam_question->question tao thuoc tinh trong mang
        // dd($exam_question->question);
        // dd(date('Y/d/m H:i:s'));

            $number_core =number_core(Auth::user()->id,$request->id_dethi);
        // dd($exam_question['exam_number']);

            $scores = new ScoresModel;

            if($exam_question['exam_number'] > count($number_core))
            {
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
                return redirect('')->with('thongbao','bạn đã làm đủ số lần đề thi này điểm đã được lưu');
            }

        }
    }
}
