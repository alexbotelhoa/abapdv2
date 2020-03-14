<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    public static function limparCarrinho(){
        session()->forget('carrinho');
    }
}
