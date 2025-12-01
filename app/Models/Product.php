<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'prix',
        'categories_id',
    ];

    // Relation avec la catégorie
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    // Relation avec les lignes de commande
    public function lignes()
    {
        return $this->hasMany(Ligne::class, 'products_id');
    }

    // Relation avec le panier (OrderCart)
    public function orderCarts()
    {
        return $this->hasMany(OrderCart::class, 'products_id');
    }

    // Accesseur pour le prix formaté
    public function getFormattedPriceAttribute()
    {
        return number_format($this->prix, 2, ',', ' ') . ' €';
    }
}