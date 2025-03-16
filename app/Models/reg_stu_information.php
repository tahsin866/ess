<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reg_stu_information extends Model
{
    //
    protected $fillable = [
        'roll',
        'reg_id',
        'name_en',
        'name_ar',
        'father_name_en',
        'father_name_ar',
        'mother_name_en',
        'mother_name_ar',
        'birth_reg_no',
        'nid_no',
    ];
}
