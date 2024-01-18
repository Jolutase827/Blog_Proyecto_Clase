<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model implements AuthenticatableContract
{
    use  HasFactory;
    use Authenticatable;

    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
