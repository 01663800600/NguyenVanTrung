<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamsModel extends Model
{
    //
    protected $table = 'exams';

    //mot de thi co nghieu cau hoi
    public function questions()
    {
    	return $this->hasMany('App\QuestionAndExamModel','id_exam','id');
    }

    public function class_exam()
    {
    	return $this->hasManyThrough('App\ExamsModel','App\SubjectsModel','id_class','id_subject','id');
    }

    

}
