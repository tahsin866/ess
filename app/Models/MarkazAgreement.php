<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarkazAgreement extends Model
{
    //
    protected $fillable = [
        'fazilat',
        'user_id',
        'user_name',
    'exam_id',
    'exam_name',
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
        'committee_resolution',
        'status'
    ];

    // public function associatedMadrasas()
    // {
    //     return $this->hasMany(MarkazAgreementMadrasa::class);
    // }



    public function associatedMadrasas()
    {
        return $this->hasMany(MarkazAgreementMadrasa::class, 'markaz_agreement_id', 'id');
    }

    public function user()  // Changed from users() to user()
    {
        return $this->belongsTo(User::class);
    }





}
