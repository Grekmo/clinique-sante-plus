<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // الحقول اللي نسمح بالكتابة فيها (mass assignable)
    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'adresse',
        'date_naissance',
        'mobile',
    ];

    // إذا بغيتي Laravel تعالج 'date_naissance' كتاريخ (Carbon instance)
    protected $casts = [
        'date_naissance' => 'date',
    ];

}
