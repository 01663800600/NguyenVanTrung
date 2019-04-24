<?php
//them function vao laravel
// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer dumpautoload

//chuyen ve ky tu khong dau
function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,$case,'utf-8');
	$str = preg_replace('/[\W|_]+/',$strSymbol,$str);
	return $str;
}

function stripUnicode($str){
	if(!$str) return '';
	//$str = str_replace($a, $b, $str);
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
		'ae'=>'ǽ',
		'AE'=>'Ǽ',
		'c'=>'ć|ç|ĉ|ċ|č',
		'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
		'd'=>'đ|ď',
		'D'=>'Đ|Ď',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
		'f'=>'ƒ',
		'F'=>'',
		'g'=>'ĝ|ğ|ġ|ģ',
		'G'=>'Ĝ|Ğ|Ġ|Ģ',
		'h'=>'ĥ|ħ',
		'H'=>'Ĥ|Ħ',
		'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',	  
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
		'ij'=>'ĳ',	  
		'IJ'=>'Ĳ',
		'j'=>'ĵ',	  
		'J'=>'Ĵ',
		'k'=>'ķ',	  
		'K'=>'Ķ',
		'l'=>'ĺ|ļ|ľ|ŀ|ł',	  
		'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
		'Oe'=>'œ',
		'OE'=>'Œ',
		'n'=>'ñ|ń|ņ|ň|ŉ',
		'N'=>'Ñ|Ń|Ņ|Ň',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
		's'=>'ŕ|ŗ|ř',
		'R'=>'Ŕ|Ŗ|Ř',
		's'=>'ß|ſ|ś|ŝ|ş|š',
		'S'=>'Ś|Ŝ|Ş|Š',
		't'=>'ţ|ť|ŧ',
		'T'=>'Ţ|Ť|Ŧ',
		'w'=>'ŵ',
		'W'=>'Ŵ',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
		'z'=>'ź|ż|ž',
		'Z'=>'Ź|Ż|Ž'
	);
	foreach($unicode as $khongdau=>$codau) {
		$arr=explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}
   	//ham de quy dang nghien cuu

	//kiem tra ban be
	function check_user($iduser)
	{
		$user_friend =  App\FriendsModel::where('id_friend', '=' , $iduser)->where('id_user','=',Auth::user()->id)->select('id_friend')->get()->toArray();
		return $user_friend;
	}

	//quan ly 3 cap nguoi dung
	function manager_parent_lv3($id_user)
	{
	
		$user_matrix = App\MatrixsModel::join('chapter' , 'chapter.id' , '=' , 'matrixs.id_chapter')
	    	->join('subject_and_chapter_item' , 'subject_and_chapter_item.id' , '=' , 'matrixs.id_item')
	    	->join('subjects' , 'subjects.id' , '=' , 'matrixs.id_subject')	
	    	->select('subject_name','subjects.id as id_subject','matrixs.id','matrixs.id_chapter','matrixs.id_item', 'chapter.chapter_name' , 'subject_and_chapter_item.subject_name_item')
	    	->where('matrixs.id_user', $id_user )->where('status_matrix',1)->get();
	

			$list_matrix = array();
			foreach ($user_matrix as $rowMatrix) {
	    		
	    		//tao key 3 truong
	    		$key_subject = $rowMatrix['id_subject'];
	    		$key_chapter = $rowMatrix['id_chapter'];
	    		$key_item = $rowMatrix['id_item'];
	    		
	    		//neu chua co mon hoc thi them vao
	    		if (!array_key_exists($key_subject, $list_matrix)) 
	    		{
	    			$list_matrix[$key_subject] = 
	    			[
	    				'name_subject' => $rowMatrix['subject_name'], 			
	    				'list_name_chapter'=> 
	    				[
	    					$key_chapter=> 
	    					[
	    						'name_chapter'=>$rowMatrix['chapter_name'],		
	    						'id_chapter'=> $key_chapter,		
	    						'list_chapter_item' => 
	    						[
	    							$key_item =>
	    							[
	    								'matrix_id' => $rowMatrix['id'],
	    								'item_name' =>$rowMatrix['subject_name_item'],
	    							],

	    						],									
	    					],
	    				],
	    			];

	    		}
	    		// neu co mon hoc va chuong chua co thi them
	    		else if ( !array_key_exists($key_chapter, $list_matrix[$key_subject]['list_name_chapter']) )
	    		{
	    			$list_matrix[$key_subject]['list_name_chapter'][] =
	    			[
	    				'name_chapter' => $rowMatrix['chapter_name'],		
	    				'id_chapter'=> $key_chapter,	
	    				'list_chapter_item' => 
	    				[
	    					$key_item =>
	    					[
	    						'matrix_id' => $rowMatrix['id'],
	    						'item_name' =>$rowMatrix['subject_name_item'],
	    					],
	    				],		
	    			];
	    		}
	    		//neu co chuong co mon hoc nhung item con thi them vao day
	    		else 
	    		{
	    			$list_matrix[$key_subject]['list_name_chapter'][$key_chapter]['list_chapter_item'][] =
	    			[
	    				'matrix_id' => $rowMatrix['id'],
	    				'item_name' =>$rowMatrix['subject_name_item'],
	    			];
	    		}
	    	}
		return $list_matrix ;

	}

	// mon hoc ban be 1 la cong khai 2 la ban be , 3 la ca nhan
	// thong tin ve de thi nguoi dung

	function manager_info_frofile($id_user,$status = '')
	{
		if(!$status = '')
		{	
	  	$number_question =  App\QuestionsModel::where('id_user','=' , $id_user )->get()->toArray();
	  	$number_friend =  App\FriendsModel::where('id_user','=' , $id_user )->get()->toArray();
	  	$number_exam =  App\ExamsModel::where('id_user','=' , $id_user )->get()->toArray();
	  	$infor_user =  App\UserInfoModel::firstOrFail()->where('id_user','=' , $id_user )->select('images','gender','introduct','created_at','full_name','title_user')->get()->toArray();
	  	}

		$info_frofile[] = ['info_user' => $infor_user,'cauhoi' => count($number_question),'banbe' => count($number_friend),'dethi' => count($number_exam)];

		return $info_frofile;
	}

	//thong tin ba kiem tra phai ban be khong
	function info_friend($id_userfiend)
	{
		// dd($id_userfiend);
		
		$info_my_friend = App\FriendsModel::join('users','users.id','=','friends.id_friend')
    	->join('user_info','user_info.id_user','=', 'friends.id_friend' )
    	->where('friends.id_user','=', Auth::user()->id )->where('friends.id_friend','=',$id_userfiend)
    	->select('users.name','friends.created_friend','friends.status_friend','user_info.*')->orderBy('friends.created_friend', 'desc')->firstOrFail()->toArray();
		// dd($info_my_friend);
    	return $info_my_friend;
	}	

	
	//lay ten chuong cua ma tran
	function get_name_chapter($idmatrix)
	{
        //ten truong
        $name_chapter = App\MatrixsModel::findOrFail($idmatrix)->toArray();

        $chapter_name = App\ChapterModel::findOrFail($name_chapter['id_chapter'])->toArray();
        $chapter_item = App\ChapterItemModel::findOrFail($name_chapter['id_item'])->toArray();


        $name_chapter = ['id_matrix' => $idmatrix,'id_user' => $name_chapter['id_user'],'chapter_name' =>$chapter_name['chapter_name'],'chapter_item' => $chapter_item['subject_name_item'] ];

        return $name_chapter;
	}
	// hiển thi đề thi bạn bè
	function show_exam_by($id_userfiend,$status = 1)
	{	
		if($status==1)
		{
			$list_exam = App\ExamsModel::join('subjects','subjects.id','=','exams.id_subject')->
			where('exams.id_user','=',$id_userfiend)->whereIn('exams.status_exam',[1,2])->select('subjects.id as id_subject','subjects.subject_name','exams.*')->orderBy('exams.created_at', 'desc')->take(5)->get()->toArray();
		}
		elseif($status==0)
		{
			$list_exam = App\ExamsModel::join('subjects','subjects.id','=','exams.id_subject')->
			where('exams.id_user','=',$id_userfiend)->whereIn('exams.status_exam',[1])->select('subjects.id as id_subject','subjects.subject_name','exams.*')->orderBy('exams.created_at', 'desc')->take(5)->get()->toArray();
		}
		else
		{
			$list_exam = App\ExamsModel::join('subjects','subjects.id','=','exams.id_subject')->
			where('exams.id_user','=',$id_userfiend)->whereIn('exams.status_exam',[1,2,3])->select('subjects.id as id_subject','subjects.subject_name','exams.*')->orderBy('exams.created_at', 'desc')->take(5)->get()->toArray();
		}

		return $list_exam;
	}

	//hien thi thong tin de thi yeu cau du lieu bao phai co ten mon hoc
	function info_exam_name($array_exam)
	{
		 $get_exam = array();

        foreach ($array_exam as $rowSubjectExam) {

            $key_subject = $rowSubjectExam['id_subject'];
            // $key_exam = $rowSubjectExam['id'];

            if (!array_key_exists($key_subject, $get_exam)) 
                {
                    $get_exam[$key_subject] = 
                    [
                        'name_subject' => $rowSubjectExam['subject_name'],
                        'list_exam' =>
                        [
                            $rowSubjectExam['id'] => 
                            [
                               "id_exam" => $rowSubjectExam['id'],
                               "id_user" => $rowSubjectExam['id_user'],
                               "title" => $rowSubjectExam['title'],
                               "created_at" => $rowSubjectExam['created_at'],
                               "time_to_do" => $rowSubjectExam['time_to_do'],
                               "exam_number" => $rowSubjectExam['exam_number'],
                               "number_question" => $rowSubjectExam['number_question'],
                               "level_of_exam" => $rowSubjectExam['level_of_exam'],
                               "same_exam" => $rowSubjectExam['same_exam'],
                               "id_group" => $rowSubjectExam['id_group'],
                               "status_exam" => $rowSubjectExam['status_exam'],
                           ],
                        ],
                    ];
                    
                }
            else
            {
                $get_exam[$key_subject]['list_exam'][] =
                [
                           "id_exam" => $rowSubjectExam['id'],
                           "id_user" => $rowSubjectExam['id_user'],
                           "title" => $rowSubjectExam['title'],
                           "created_at" => $rowSubjectExam['created_at'],
                           "time_to_do" => $rowSubjectExam['time_to_do'],
                           "exam_number" => $rowSubjectExam['exam_number'],
                           "number_question" => $rowSubjectExam['number_question'],
                           "level_of_exam" => $rowSubjectExam['level_of_exam'],
                           "same_exam" => $rowSubjectExam['same_exam'],
                           "id_group" => $rowSubjectExam['id_group'],
                           "status_exam" => $rowSubjectExam['status_exam'],

                ];
            }

        }

        return $get_exam;
	}

	//dem so lan thi thi
	function number_core($iduser,$idexam)
	{
		$number_exam = App\ScoresModel::where('id_user',$iduser)->where('id_exam',$idexam)->get()->toArray();

		return $number_exam;
	}

	// function mutual_friend($id_user)
	// {
	// 	$info_my_friend = App\FriendsModel::join('users','users.id','=','friends.id_friend')
 //    	->join('user_info','user_info.id_user','=', 'friends.id_friend' )->where('status_friend','=',1)
 //    	->where('friends.id_user','=', $id_user)
 //    	->select('id')->get()->toArray();

 //    	$my_friend = App\FriendsModel::join('users','users.id','=','friends.id_friend')
 //    	->join('user_info','user_info.id_user','=', 'friends.id_friend' )->where('status_friend','=',1)
 //    	->where('friends.id_user','=', Auth::user()->id)
 //    	->select('id')->get()->toArray();
		
	// 	// $friend = array_diff($my_friend,$info_my_friend);

 //    	return $my_friend;
	// }

	
?>