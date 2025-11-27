<?php

namespace App\Models;

use App\Models\Ligne;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'products_id',
        'quantite',
    ];

    protected $casts = [
        'quantite' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relation: Un panier appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation: Un panier peut avoir plusieurs lignes
    public function ligne()
    {
        return $this->hasMany(Ligne::class);
    }
}