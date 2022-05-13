<?php

namespace App\Models;

use App\Http\Controllers\QuizController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Apprenant extends Model
{

    use HasFactory;
    protected $table = 'apprenants';
protected $fillable = ['name', 'user_id', 'niveau_etu', 'ecole'];

public function user(): BelongsTo
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
public function quiz()
{
    return $this->hasMany('App\Models\quiz');
}
public function inscription()
{
    return $this->hasMany('App\Models\inscription');
}
public function avancement()
{
    return $this->hasMany('App\Models\avancement');
}
public function formations()
    {
        return $this->belongsToMany(Formation::class)->using(Inscription::class);
    }

}
