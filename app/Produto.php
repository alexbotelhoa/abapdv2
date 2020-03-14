<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome'];

    public function categoria(){
        return $this->hasOne('App\Categoria', 'id', 'categoria_id');
    }
}
