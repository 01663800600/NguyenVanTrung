<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\QuestionsModel;
use App\MatrixsModel;
use App\SubjectsModel;

class ProfileController extends Controller
{
    //

    //lay thong tin nguoi dung
    public function getProfile()
    {
	   $get_subject_user = SubjectsModel::where('status_subject',1)->select('id','subject_name')->get()->toArray();


	  	// hàm cục bộ
       $list_matrix = (manager_parent_lv3(Auth::user()->id));
       $infor_user = (manager_info_frofile(Auth::user()->id));

    	return view('pages.membermanager.profile', compact('list_matrix','infor_user','get_subject_user'));
    }

    //lay thong tin cau hoi nguoi dung
    function getProfileCauHoi($idmatrix)
    {
    	$check_create = MatrixsModel::where('id',$idmatrix)->select('id_user')->firstOrFail()->toArray();

    	if(Auth::user()->id != $check_create['id_user'])
    	{
            return redirect('')->with('thongbao','Cảnh cáo lần 1 : Bạn không được phép sửa URL');

    	}
    	else
    	{
    		$list_question =  QuestionsModel::where('id_matrix',$idmatrix)->where('id_user','=' , Auth::user()->id )->whereIn('status_question',[1,2,3])->get()->toArray();

    		$name_matrix = MatrixsModel::join('chapter' , 'chapter.id' , '=' , 'matrixs.id_chapter')
    		->join('subject_and_chapter_item' , 'subject_and_chapter_item.id' , '=' , 'matrixs.id_item')
    		->select('chapter.chapter_name' ,'matrixs.id_subject', 'subject_and_chapter_item.subject_name_item')->where('matrixs.id',$idmatrix)->get()->toArray();
    		
    		return view('pages.membermanager.profile_question',compact('list_question','name_matrix','idmatrix'));

    	}

    }

    // xoa cau hoi nguoi dung
    public function getProfileDeleteQuestion($idquestion)
    {	
    	$flight = QuestionsModel::where('id_user' ,'=', Auth::user()->id )->where('id',$idquestion)->firstOrFail();
    	$name_question =$flight['content_question'];
    	$id_matrix =$flight['id_matrix'];
		$flight->delete();
		return redirect('profile-question/'.$id_matrix)->with('thongbao','Xóa thành công Câu hỏi : '.$name_question);
	}

    //hien thi cau hoi nguoi dung
	public function getProfileCreatedCauHoi($id_matrix)
	{
		$get_name_chapter = get_name_chapter($id_matrix);
		if($get_name_chapter['id_user'] == Auth::user()->id)
		{
			return view('pages.membermanager.profile_created_question',compact('id_matrix','get_name_chapter'));
		}
		else 
		{
			return redirect('')->with('thongbao','Bạn không có quyền ở đây');
		}
	}

    //xoa cau hoi nguoi dung
	public function postProfileCreatedCauHoi(Request $request)
	{
		//check dieu kiem mang 1 la loi mang 2 la thong bao, nguoi sac nhan validate:xac nhan
        $this->validate($request,
            [
                'noidungcauhoi' => 'required|max:1000', // bai buoc ,bảnng + tên cột
                'cauhoi1' => 'required|max:1000', // bai buoc ,bảnng + tên cột
                'cauhoi2' => 'required|max:1000', // bai buoc ,bảnng + tên cột
                'cauhoi3' => 'required|max:1000', // bai buoc ,bảnng + tên cột
                'cauhoi4' => 'required|max:1000', // bai buoc ,bảnng + tên cột
            ],
            [
                'noidungcauhoi.required' => 'Bạn chưa nhập Nội Dung câu hỏi ', // thông báo
                'noidungcauhoi.max' => 'Tối đa cau hoi 100 ký tự ', // thông báo
                'cauhoi1.required' => 'Bạn chưa nhập Câu trả lời 1', // thông báo
                'cauhoi1..max' => 'Tối đa chỉ 1000 ký tự', // thông báo
                'cauhoi2.required' => 'Bạn chưa nhập Câu trả lời 2', // thông báo
                'cauhoi2..max' => 'Tối đa chỉ 1000 ký tự', // thông báo
                'cauhoi3.required' => 'Bạn chưa nhập Câu trả lời 3', // thông báo
                'cauhoi3..max' => 'Tối đa chỉ 1000 ký tự', // thông báo
                'cauhoi4.required' => 'Bạn chưa nhập Câu trả lời 4', // thông báo
                'cauhoi4..max' => 'Tối đa chỉ 1000 ký tự', // thông báo

            ]);

        // bat xong lưu tên vao model thể loại
        $question = new QuestionsModel;
        $question->content_question = $request->noidungcauhoi;
        $question->question_a = $request->cauhoi1;
        $question->question_b = $request->cauhoi2;
        $question->question_c = $request->cauhoi3;
        $question->question_d = $request->cauhoi4;
        $question->id_user = Auth::user()->id;
        $question->id_matrix = $request->id_matrix;
        $question->answer = $request->dapan;
        $question->status_question = $request->trangthai;
        $question->level_of_question = $request->dokho;
        $question->save();

        //dua thong báo sang view redirect
		return redirect('profile-created-question/'.$request->id_matrix)->with('thongbao','thêm thành công');
	}

    //sua cau hoi nguoi dung
	public function postProfileEditCauHoi(Request $request)
	{
		 $Editquestion = QuestionsModel::findOrFail($request->id_quesion);
		$this->validate($request,
            [
                'noidungcauhoi' => 'required|max:1000', // bai buoc ,bảnng + tên cột
                'cauhoi1' => 'required|max:1000', // bai buoc ,bảnng + tên cột
                'cauhoi2' => 'required|max:1000', // bai buoc ,bảnng + tên cột
                'cauhoi3' => 'required|max:1000', // bai buoc ,bảnng + tên cột
                'cauhoi4' => 'required|max:1000', // bai buoc ,bảnng + tên cột
            ],
            [
                'noidungcauhoi.required' => 'Bạn chưa nhập Nội Dung câu hỏi ', // thông báo
                'noidungcauhoi.max' => 'Tối đa cau hoi 100 ký tự ', // thông báo
                'cauhoi1.required' => 'Bạn chưa nhập Câu trả lời 1', // thông báo
                'cauhoi1.max' => 'Tối đa chỉ 1000 ký tự', // thông báo
                'cauhoi2.required' => 'Bạn chưa nhập Câu trả lời 2', // thông báo
                'cauhoi2.max' => 'Tối đa chỉ 1000 ký tự', // thông báo
                'cauhoi3.required' => 'Bạn chưa nhập Câu trả lời 3', // thông báo
                'cauhoi3.max' => 'Tối đa chỉ 1000 ký tự', // thông báo
                'cauhoi4.required' => 'Bạn chưa nhập Câu trả lời 4', // thông báo
                'cauhoi4.max' => 'Tối đa chỉ 1000 ký tự', // thông báo

            ]);

        $Editquestion->content_question = $request->noidungcauhoi;
        $Editquestion->question_a = $request->cauhoi1;
        $Editquestion->question_b = $request->cauhoi2;
        $Editquestion->question_c = $request->cauhoi3;
        $Editquestion->question_d = $request->cauhoi4;
        // $Editquestion->id_user = Auth::user()->id;
        // $Editquestion->id_matrix = $request->id_matrix;
        $Editquestion->answer = $request->dapan;
        $Editquestion->status_question = $request->trangthai;
        $Editquestion->level_of_question = $request->dokho;

        $Editquestion->save();

        //dua thong báo sang view redirect

        return redirect('profile-question/'.$request->id_matrix)->with('thongbao','Sửa thành công');
	}

    //tao mon hoc  chua xong ---------------------------------------------------------------------------------------------
    public function postProfileCreatedSubject(Request $request)
    {
        // dd($request);
        $a = 0; 
        $this->validate($request,
            [
                'tenmon' => 'required|exists:matrixs,id_subject',
                // 'tenmon' => 'required|unique:matrixs,id_subject,Auth::user()->id,id_user,status_matrix,1',
                'tenchuong' => 'required|max:190', // bai buoc ,bảnng + tên cột
                'tenmuc' => 'required|max:1000', // bai buoc ,bảnng + tên cột
            ],
            [
                'tenmon.exists' => 'da ton tai ', // thông báo
                'tenmon.required' => 'Bạn chưa Chọn môn ', // thông báo
                // 'tenmon.unique' => 'Bạn đã tạo môn học này không thể tạo thêm', // thông báo
                'tenchuong.required' => 'Bạn chưa nhập Chương |', // thông báo
                'tenchuong.max' => 'Tối đa chỉ 190 ký tự', // thông báo
                'tenmuc.required' => 'Bạn chưa nhập mục của Chương |', // thông báo
                'tenmuc.max' => 'Tối đa chỉ 1000 ký tự', // thông báo
            ]
        );
        // dd($a);
        return redirect('profile.php')->with('thongbao','Thêm thành công');
    }
	
}
