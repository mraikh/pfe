<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    use HasFactory;protected $table = 'inscriptions';
    protected $fillable = ['formation_id', 'apprenant_id'];
    protected $increment = true;
    public function Apprenant()
    {
        return $this->belongsTo('App\Models\Apprenant');
    }
    public function formation()
    {
        return $this->belongsTo('App\Models\formation');
    }
}
