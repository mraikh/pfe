<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formateur extends Model
{
    use HasFactory;
    protected $table = 'formateurs';
protected $fillable = ['name', 'user_id'];

public function user(): BelongsTo
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

public function formation()
{
    return $this->hasMany('App\Models\formation');
}
}
