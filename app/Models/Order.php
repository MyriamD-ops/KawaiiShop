<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'montant',
        'state',
        'date',
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relation avec les lignes de commande
    public function lignes()
    {
        return $this->hasMany(Ligne::class, 'orders_id');
    }
}