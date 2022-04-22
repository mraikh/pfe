<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cour extends Model
{
    use HasFactory;
    public function chapitre()
    {
        return $this->hasMany('App\Models\chapitre');
    }
    public function formation()
{
    return $this->belongsTo('App\Models\formation');
}
}
