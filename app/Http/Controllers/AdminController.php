<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectsModel;
use App\ClassesModel;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    public function getTrangChu()
    { 
    
      $admin_subject = SubjectsModel::join('classes', 'classes.id' , '=', 'subjects.id_class')
      ->select('subjects.id', 'subjects.subject_name', 'subjects.id_sd', 'subjects.id_class', 'classes.class_name')->where('id_user', Auth::user()->id)->get();

      $list_class = []; 
      // dd( $admin_subject);
      foreach ($admin_subject as $rowSubject) {
        //Su dung id class lam key cho mang list_class de nhom cac lop co cung mon hoc ley cho truoc
        $key = $rowSubject['id_class'];
        if (!array_key_exists($key, $list_class)) {
          //Neu mang list_class ko ton tai key = $rowSubject['id_class'] thi su dung $rowSubject['id_class'] lam key cho phan tu class dau tien
          
          $list_class[$key] = [
            'class_id' => $rowSubject['id_class'],
            'class_name' => $rowSubject['class_name'],
            'subjects' => [
              [
                'subject_id' => $rowSubject['id'],
                'sd_id' => $rowSubject['id_sd'],
                'subject_name' => $rowSubject['subject_name'],
              ],
            ],
          ];

        } else {
          //Nguoc lai, trong mang $list_class da ton tai key = $rowSubject['id_class'] thi chi them class vao mang classes
          $list_class[$key]['subjects'][] = [
            'subject_id' => $rowSubject['id'],
            'sd_id' => $rowSubject['id_sd'],
            'subject_name' => $rowSubject['subject_name'],
          ];
        }
        
      }

      return view('admin.layouts.home_admin', compact('list_class'));

    }
     
}
