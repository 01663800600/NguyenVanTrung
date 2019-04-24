<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionsModel;
use App\SubjectsModel;
use App\MatrixsModel;

use Illuminate\Support\Facades\Auth;


class QuestionsController extends Controller
{
    //lay danh sach cau hoi admin ------------- chua gop thanh 1 mang
    public function getCauHoi($idmatrix)
    {
    	$list_question = QuestionsModel::where('id_matrix',$idmatrix)->where('status_question',0)->get();

    	$name_matrix = MatrixsModel::join('chapter' , 'chapter.id' , '=' , 'matrixs.id_chapter')
    	->join('subject_and_chapter_item' , 'subject_and_chapter_item.id' , '=' , 'matrixs.id_item')
    	->select('chapter.chapter_name' ,'matrixs.id_subject', 'subject_and_chapter_item.subject_name_item')->where('matrixs.id', $idmatrix)->get();
   
   		// dd($list_question);
    	return view('admin/questions/manager_question',compact('name_matrix','list_question'));
    }

    //xoa cau hoi admin
    public function getDeleteQuestion($idquestion,$id_matrix)
    {	
    	$flight = QuestionsModel::where('id_user' ,'=', Auth::user()->id )->where('id',$idquestion)->where('status_question',0)->firstOrFail();
    	$name_question =$flight['content_question'];
		$flight->delete();
		return redirect('admin/cauhoi/'.$id_matrix)->with('thongbao','Xóa thành công Câu hỏi : '.$name_question);
    }
}
