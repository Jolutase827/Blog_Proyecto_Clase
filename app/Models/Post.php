<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titulo', 'contenido'];
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
