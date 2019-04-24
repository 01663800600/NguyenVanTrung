<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsModel extends Model
{
    //
    protected $table = 'questions';
    public  $timestamps = false;

    //nhieu cau hoi thuoc mot ma tran
    public function matrix()
    {
    	return $this->belongsTo('App\MatrixsModel','id_matrix','id');
    }

    //lay de thi tu cau hoi tu id question > id exam = lay duoc de thi
    //ten model cuoi cung > ten model trung gian 
    //Đối số thứ 3 là foreign key của model trung gian, đối số thứ 4 là foreign key của model cuối cùng và đối số thứ 5 là local key.

    //moy cau hoi co nhieu de thi
    public function question_and_exam()
    {
    	return $this->hasMany('App\QuestionAndExamModel','id_question','id');
    }

    // public function exam()
    // {
    // 	return $this->belongsToMany('App\QuestionAndExamModel');
    // }
}
