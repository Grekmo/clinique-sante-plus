<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'adresse',
        'date_naissance',
        'mobile',
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function doctors() {
        return $this->belongsToMany(Doctor::class, 'appointments');
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
