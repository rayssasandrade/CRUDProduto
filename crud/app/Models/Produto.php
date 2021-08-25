<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'custo' , 'preco' , 'quantidade'];

    public function pedidos_produtos()
    {
        return $this->hasMany(Pedidos_Produtos::class);
    }
}
