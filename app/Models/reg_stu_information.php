<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reg_stu_information extends Model
{
    //
    protected $fillable = [
        'name_bn',
        'name_en',
        'name_ar',
        'father_name_bn',
        'father_name_en',
        'father_name_ar',
        'mother_name_bn',
        'mother_name_en',
        'mother_name_ar',
        'BRN_no',
        'NID_no',
        'madrasha_name',
        'markaz_name',
        'present_division_name',
        'present_DID',
        'present_district_name',
        // 'present_district_id',
        'present_thana_name',
        // 'present_thana_id',
        // 'exam_id',
        'exam_name_bn',
        'roll',
        'reg_id',
        'past_Roll',
        'past_reg_id',
        // 'marhala_id',
        'student_type',
        'class',
        'Division',
        'Date_of_birth',
        'current_madrasha',
        'current_markaz',
        'current_class',
        'sublabel_1'
    ];
}
