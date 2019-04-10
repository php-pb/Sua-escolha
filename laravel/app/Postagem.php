<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    protected $table = 'postagens';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }

}
