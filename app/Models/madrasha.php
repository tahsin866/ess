<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class madrasha extends Model
{

protected $table = 'madrasha';


protected $fillable = [
    'MName_uni',
    'ElhaqNo',
    'MType',
        'markaz_serial',
        'Mobile',
        'division',
        'district',
        'Thana_uni'
];


public function users()
{
    return $this->hasMany(User::class, 'madrasha_id');
}


}
