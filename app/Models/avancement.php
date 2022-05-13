<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avancement extends Model
{
    use HasFactory;
    protected $table = 'avancements';
    protected $fillable = ['cour_id','chapitre_id', 'apprenant_id'];
    protected $increment = true;
    public function chapitre()
    {
        return $this->belongsTo('App\Models\Chapitre');
    }
    public function Apprenant()
    {
        return $this->belongsTo('App\Models\Apprenant');
    }
}
