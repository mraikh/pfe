<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    use HasFactory;
    protected $table = 'quizzes';
    public function Apprenant()
{
    return $this->belongsTo('App\Models\Apprenant');
}
public function chapitre()
{
    return $this->belongsTo('App\Models\chapitre');
}

}
