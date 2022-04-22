<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    use HasFactory;
    public function Apprenant()
    {
        return $this->belongsTo('App\Models\Apprenant');
    }
}
