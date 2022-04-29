<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;

    protected $table = 'chapitres';
    protected $fillable = [
        'description',
        'file',
        'quiz',
        'cours_id'
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'chapitre_id', 'id');
    }
    
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id', 'id');
    }
}
