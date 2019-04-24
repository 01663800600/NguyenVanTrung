<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendsModel extends Model
{
    //
	protected $table = 'friends';

	public function friend()
	{
		return $this->hasOneThrough('App\UserInfoModel','App\User','id','id_user','id_friend');
	}
}
