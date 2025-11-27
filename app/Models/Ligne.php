<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\Order_cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Line extends Model
{
     protected $table = 'ligne';
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantite',
        'montant',
        'date',
       
    ];

    protected $casts = [
        'quantite' => 'integer',
        'montant' => 'decimal:2',
        'date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relation: Une ligne appartient à une commande (optionnel)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relation: Une ligne appartient à un panier (optionnel)
    public function order_cart()
    {
        return $this->belongsTo(Ordercart::class);
    }

    // Relation: Une ligne concerne un produit
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}