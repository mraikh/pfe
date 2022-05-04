<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Inscription extends Pivot
{
    use HasFactory;

    /**
     * For more details, read the docs:
     * https://laravel.com/docs/9.x/eloquent-relationships#many-to-many
     */
    
    protected $table = 'inscriptions';
    protected $fillable = ['formation_id', 'apprenant_id'];
    protected $increment = true; // to make this model auto increment the key whenever it add adds a new record
}
