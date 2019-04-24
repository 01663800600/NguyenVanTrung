<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassesModel extends Model
{
    //
	protected $table = 'classes';

	// 1 lop hoc co nhieu mon hoc
	public function subject()
	{
		return $this->hasMany('App\SubjectsModel','id_class','id');
	}    

}
