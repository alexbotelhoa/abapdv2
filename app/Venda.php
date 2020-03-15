<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['name'];

    public function produto(){
        return $this->hasOne('App\Produto', 'id', 'produto_id');
    }
}
