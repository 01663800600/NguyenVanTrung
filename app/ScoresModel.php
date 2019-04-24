<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoresModel extends Model
{
	public  $timestamps = false;
    //
    protected $table = 'scores';


    public function score_user()
    {
    	return $this->belongsTo('App\User','id_user','id');

    }

    public function exam()
    {
    	return $this->belongsTo('App\User','id_user','id');

    }

    
}
