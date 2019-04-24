<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAndExamModel extends Model
{
    //
    protected $table = 'question_and_exam';
	public  $timestamps = false;
    

    //dung many to many
    public function question()
    {
     	return $this->hasMany('App\QuestionsModel','id','id_question');
    }
}
