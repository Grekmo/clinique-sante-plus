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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
    public function appointments() {
        return $this->hasMany(Appointment::class,);
    }
    public function patients() {
        return $this->belongsToMany(Patient::class, 'appointments');
    }
    public function consultations() 
    {
        return $this->hasMany(Consultation::class);
    }
}
