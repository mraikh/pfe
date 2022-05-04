<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    use HasFactory;protected $table = 'inscriptions';
    protected $fillable = ['formation_id', 'apprenant_id'];
    protected $increment = true;
}
