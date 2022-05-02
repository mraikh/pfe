<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;
    protected $table = 'formations';
protected $fillable = ['intitule', 'formateur_id'];
    public function cour()
    {
        return $this->hasMany('App\Models\cour');
    }
    public function Apprenant()
    {
        return $this->hasMany('App\Models\Apprenant');
    }
    public function Formateur()
{
    return $this->belongsTo('App\Models\Formateur');
}
public function inscription()
{
    return $this->hasMany('App\Models\inscription');
}
}
