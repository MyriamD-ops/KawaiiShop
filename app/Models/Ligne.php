<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    use HasFactory;

    protected $fillable = [
        'orders_id',
        'products_id',
        'quantite',
        'montant',
        'date',
    ];

    // Relation avec la commande
    public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }

    // Relation avec le produit
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}