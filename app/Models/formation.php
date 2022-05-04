<?php

namespace App\Models;

use App\Models\Apprenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Formation extends Model
{
    use HasFactory;
    protected $table = 'formations';
    protected $fillable = ['intitule', 'formateur_id', 'description'];

    public function cours()
    {
        return $this->hasMany(Cours::class, 'formation_id', 'id');
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class, 'formateur_id', 'id');
    }

    /**
     * La formation a plusieurs apprenants liées entre eux par insriptions,
     * inscription est un intermédiare.
     * 
     * For more details, read the docs:
     * https://laravel.com/docs/9.x/eloquent-relationships#many-to-many
     */
    public function apprenants()
    {
        return $this->belongsToMany(Apprenant::class, 'inscriptions')->using(Inscription::class);
    }
}
