<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }
}