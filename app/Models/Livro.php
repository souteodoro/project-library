<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $with = ['genero'];

    public function genero(){
        return $this->belongsTo(Genero::class);
    }
}
