<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Produto extends Model
{
    protected $fillable = ['produto_id', 'pedido_id','quantidade', 'status'];
    public function pedidos()
    {
        return $this->belongsTo(Pedido::class);
    }
    public function produtos()
    {
        return $this->belongsTo(Produto::class);
    }
}
