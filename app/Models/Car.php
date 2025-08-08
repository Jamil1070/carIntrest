<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name', 'model', 'description', 'photo_url'];

    // Relatie: een auto heeft veel comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
