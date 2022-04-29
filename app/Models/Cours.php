<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $table = 'cours';
    protected $fillable = [
        'intitule',
        'description',
        'duree',
        'formation_id',
    ];

    public function chapitres()
    {
        return $this->hasMany(Chapitre::class, 'cours_id', 'id');
    }

    public function formation()
    {
        return $this->belongsTo(Formateur::class, 'formateur_id', 'id');
    }
}
