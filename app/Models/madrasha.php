<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class madrasha extends Model
{

protected $table = 'madrasha';


protected $fillable = [
    'MName_uni',
    'ElhaqNo'
];


public function users()
{
    return $this->hasMany(User::class, 'madrasha_id');
}


}
