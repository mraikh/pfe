<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apprenant extends Model
{

    use HasFactory;
    protected $table = 'apprenants';
    protected $fillable = ['name', 'user_id', 'niveau_etu', 'ecole']; // Add the other columns

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'apprenant_id', 'id');
    }


    /**
     * L'apprenant a plusieurs formations liées entre eux par insriptions,
     * inscription est un intermédiare.
     * 
     * For more details, read the docs:
     * https://laravel.com/docs/9.x/eloquent-relationships#many-to-many
     */

    public function formations()
    {
        return $this->belongsToMany(Formation::class)->using(Inscription::class);
    }
}
