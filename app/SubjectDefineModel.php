<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectDefineModel extends Model
{
    protected $table = 'subject_define';
    protected $primaryKey = 'sd_id';

    //id_sd nằm ở bảng subjects, sd_id nằm ở bảng subject_define
    public function subjects() {
        return $this->hasMany('App\SubjectsModel', 'id_sd', 'sd_id');
    }
}
