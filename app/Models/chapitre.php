<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapitre extends Model
{
    use HasFactory;
    public function quiz()
{
    return $this->hasMany('App\Models\quiz');
}
public function avancement()
{
    return $this->hasMany('App\Models\avancement');
}
public function cour()
{
    return $this->belongsTo('App\Models\cour');
}
}
