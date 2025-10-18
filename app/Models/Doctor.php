<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'cin',
        'mobile',
        'adresse',
        'date_naissance',
        'speciality_id',
    ];
    protected $casts = [
        'date_naissance' => 'date',
    ];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
