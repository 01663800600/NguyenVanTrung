<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectsModel;
use App\MatrixsModel;
use App\ChapterModel;
use App\ChapterItemModel;
use Illuminate\Support\Facades\Auth;




class SubjectsController extends Controller
{
    //lay danh sach mon hoc nguoi dung
    public function getMonHoc($idmonhoc)
    {
    	$matrix = MatrixsModel::join('chapter' , 'chapter.id' , '=' , 'matrixs.id_chapter')
    	->join('subject_and_chapter_item' , 'subject_and_chapter_item.id' , '=' , 'matrixs.id_item')
    	->select('matrixs.id','matrixs.id_chapter', 'chapter.chapter_name' , 'subject_and_chapter_item.subject_name_item')
    	->where('id_user', Auth::user()->id )->where('id_subject', $idmonhoc)->get();

    	// firstOrFail sử dung cho where

    	$name_subject = SubjectsModel::findOrFail($idmonhoc);

    	$name_subject =$name_subject['subject_name'];

    	$list_matrix = array();
		//thực hiện sắp xếp lại mảng
    	foreach ($matrix as $rowMatrix) {
    		
    		$key_chapter = $rowMatrix['id_chapter'];

    		if (!array_key_exists($key_chapter, $list_matrix)) 
    		{
    			$list_matrix[$key_chapter] = 
    			[
	    			
	    			'chapter_name'=>  $rowMatrix['chapter_name'],	
    				'chapter_item' => 
    				[
	    				[
	    					'matrix_id' => $rowMatrix['id'],
	    					'item_name' =>$rowMatrix['subject_name_item'],
	    				],
					],
    			];
    		
    		}
    		
    		else {
    			$list_matrix[$key_chapter]['chapter_item'][] =
    			[
    				'matrix_id' => $rowMatrix['id'],
					'item_name' =>$rowMatrix['subject_name_item'],
    			];
    		}
    	}

    	return view('admin/subjects/manager_subject',compact('list_matrix','name_subject'));
    }
}
