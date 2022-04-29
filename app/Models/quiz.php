<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quizzes';

    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class, 'apprenant_id', 'id');
    }

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class, 'chapitre_id', 'id');
    }

}
