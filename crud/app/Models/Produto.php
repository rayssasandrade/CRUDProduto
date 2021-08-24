<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'custo' , 'preco' , 'quantidade'];

    public function search($filter = null)
    {
        $results = $this->where(function($query) use($filter){
            if($filter){
                $query->where('nome', 'LIKE', "%{$filter}%");
                // $query->where('custo', 'LIKE', "%{$filter}%");
                // $query->where('preco', 'LIKE', "%{$filter}%");
                // $query->where('quantidade', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return results;
    }

    public function pedidos()
    {
        return $this->belongsTo(Pedidos::class);
    }
}
