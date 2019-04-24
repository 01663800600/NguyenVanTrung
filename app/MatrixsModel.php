<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrixsModel extends Model
{
    //
    protected $table = 'matrixs';

    //mot ma tran thuoc 1 mon hoc
    public function subject()
    {
    	return $this->belongsTo('App\SubjectsModel','id_subject','id');
    }

    //mot ma tran co nhieu cau hoi
    public function questions()
    {
    	return $this->hasMany('App\QuestionsModel','id_matrix','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }

    // public function chapter()
    // {
    //     return $this->hasMany('App\User','id_user','id');
    // }

    
}
