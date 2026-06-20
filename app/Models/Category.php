<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     public function livros()
    {
        return $this->hasMany(Livro::class, 'categoria_id');
    }
}
