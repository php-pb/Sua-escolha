<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function postagem()
    {
        return $this->belongsTo('App\Postagem');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
