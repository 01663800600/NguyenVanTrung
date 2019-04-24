<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectsModel extends Model
{
    //
    protected $table = 'subjects';

    //mot mon hoc thuoc ve 1 lop hoc class
    public function class()
    {
    	return $this->belongsTo('App\ClassesModel','id_class','id');
    }

    //id_sd nằm ở bảng subjects, sd_id nằm ở bảng subject_define
    public function subjectDefine() {
        return $this->belongsTo('App\SubjectDefineModel', 'id_sd', 'sd_id');
    }

    //mot mon hoc co nhieu ma tran matrixs
    public function matrixs()
    {
    	return $this->hasMany('App\MatrixsModel','id_subject','id');
    }
    
    //mot de thi  1 ten mon hoc
    public function name_subject()
    {
        return $this->belongsTo('App\SubjectsModel','id_subject','id');
    }
    
    
}
