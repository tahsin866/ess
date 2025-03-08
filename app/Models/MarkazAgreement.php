<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarkazAgreement extends Model
{
    //
    protected $fillable = [
        'fazilat',
        'user_id',
        'sanabiya_ulya',
        'sanabiya',
        'mutawassita',
        'ibtedaiyyah',
        'hifzul_quran',
        'noc_file',
        'resolution_file',
        'requirements',
        'muhtamim_consent',
        'president_consent',
        'committee_resolution'
    ];

    public function associatedMadrasas()
    {
        return $this->hasMany(MarkazAgreementMadrasa::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }


}
