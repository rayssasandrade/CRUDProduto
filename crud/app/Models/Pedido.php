<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['valor', 'status', 'cliente_id'];
    public function pedidos_produtos()
    {
        return $this->hasMany(Pedidos_Produtos::class);
    }
    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }
}
