<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//test class
Use App\ClassesModel;

// Use App\ScoresModel;
// Use App\User;
// Route::get('test-class', function ()
// {
// 	// $class = QuestionAndExamModel::where('id_question',6)->get();
//     $class = ScoresModel::where('id_user',3)->get();
// 	foreach ($class->score_user as $value) {
// 		echo $value;
// 		echo '<br>';
// 	}
// });


//trang chu
Route::get('','PageController@getTrangChu'); 


// route to process the form
Route::post('login', array(
  'uses' => 'LoginController@postDoLogin'
));

Route::get('logout', array(
  'uses' => 'LoginController@getDoLogout'
));



//User route to show the login form
Route::get('login', 'LoginController@getLogin' );
Route::post('login', 'LoginController@postDoLogin');

// admind route to show the login form
Route::get('tracnghiem-login-admin', 'LoginController@getAdminLogin' );
Route::post('tracnghiem-login-admin', 'LoginController@postAdminDoLogin');

// admind route to show the login form
Route::group(['prefix'=>'admin','middleware' => 'adminLogin'], function (){
	
	Route::get('trangchu', 'AdminController@getTrangChu');

	//danh sach môn học
	Route::get('quanlychuong', 'SubjectsController@getQuanLyChuong');

	//danh sach de thi
	Route::get('quanlycauhoi', 'QuestionsController@getQuanLyDethi');

	//danh sach de thi
	Route::get('quanlydethi', 'ExamsController@getQuanLyDethi');


	//lay danh sach mon hoc dâng quan ly
	Route::get('monhoc/{idmonhoc}', 'SubjectsController@getMonHoc')->where('idmonhoc', '[0-9]+');	

	
	//lay danh sach ma tran dang quan ly
	Route::get('cauhoi/{idmatrix}', 'QuestionsController@getCauHoi')->where('idmatrix', '[0-9]+');	

	//lay danh sach ma tran dang quan ly
	Route::get('xoacauhoi/{idquestion}/{id_matrix}', 'QuestionsController@getDeleteQuestion')->where('idquestion', '[0-9]+')->where('id_matrix','[0-9]+');

	// Route::group(['prefix'=>'sub'], callback)

});





Route::group(['prefix'=>'/','middleware' => 'userLogin'], function(){ 
	
	//Người dùng
	Route::get('nguoidung','PageController@getNguoiDung');

	//Chọn ôn thi trắc nghiệm
	Route::get('onthi','PageController@getOnThi');

	//on thi theo lop
	Route::get('onthi/{idLop}','PageController@getOnThiTheoLop')->where('idLop', '[0-9]+');

	//Ôn thi trắc nghiệm chung 
	Route::get('lamonthingaunhien/{idMatrix}','PageController@getLamOnThiNgauNhien')->where('idMatrix', '[0-9]+');

	// Route::post('lamonthingaunhien','PageController@PostLamOnThiNgauNhien');

	//Chọn  thi trắc nghiệm
	Route::get('thihethong', function () {
		$class= ClassesModel::all();		
		return view('pages.member.thihethong',['Class'=>$class]);
	})->middleware('auth','revalidate');


	// hien thi danh sach de thi lop
	Route::get('thihethong/{idlop}','PageController@getThiHeThong')->where('idlop', '[0-9]+');

	// lam de thi 
	Route::post('lambai','PageController@postLamBai');

	//cham diem
	Route::post('ketquathi', 'PageController@postKetQuaThi');

	//Người dùng thong tin
	Route::get('profile.php','ProfileController@getProfile');
	//them mon hoc
	Route::post('profile-created-subject','ProfileController@postProfileCreatedSubject');


	//Người danh sách câu hỏi
	Route::get('profile-question/{idMatrix}','ProfileController@getProfileCauHoi')->where('idMatrix', '[0-9]+');	

	//view cau hoi
	Route::get('profile-created-question/{idMatrix}','ProfileController@getProfileCreatedCauHoi')->where('idMatrix', '[0-9]+');
	//them
	Route::post('profile-created-question','ProfileController@postProfileCreatedCauHoi');
	//sua
	Route::post('profile-edit-question','ProfileController@postProfileEditCauHoi');



	// Xoa cau hoi nguoi dung
	Route::get('question-delete/{idquestion}/{id_matrix}', 'ProfileController@getProfileDeleteQuestion')->where('idquestion', '[0-9]+')->where('id_matrix','[0-9]+');

	//ban be
	Route::get('friend.php','FriendsController@getFriend');

	//thong tin  ban be
	Route::get('friend/id=10000{iduserfriend}','FriendsController@getUserFriend')->where('iduserfriend', '[0-9]+');	

	//thong tin  cau hoi ban be
	Route::get('friend-question/friend=8F{iduserfriend}41T{idmatrixfriend}','FriendsController@getFriendQuestion')->where('idmatrixfriend', '[0-9]+')->where('iduserfriend','[0-9]+');

	//List cau hoi dap án
	Route::get('list-friend-question/friend=8F{iduserfriend}41T{idmatrixfriend}','FriendsController@getListFriendQuestion')->where('idmatrixfriend', '[0-9]+')->where('iduserfriend','[0-9]+');	

	//List de thi ban be
	Route::get('list-friend-exam/friend=8F{iduserfriend}41T','FriendsController@getListFriendExam')->where('iduserfriend', '[0-9]+');

	Route::post('lambaibanbe','FriendsController@postLamBaiBanBe');


});
