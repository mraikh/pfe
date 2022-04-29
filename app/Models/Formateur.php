<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formateur extends Model
{
    use HasFactory;
    protected $table = 'formateurs';
    protected $fillable = ['user_id', 'specialite', 'biography'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function formations()
    {
        return $this->hasMany(Formation::class, 'formateur_id', 'id');
    }
}
