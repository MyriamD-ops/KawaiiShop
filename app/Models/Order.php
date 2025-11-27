<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ligne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'montant',
        'state',
        'date',
    ];

    protected $casts = [
        'montant' => 'decimal:2',
        'date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relation: Une commande appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation: Une commande peut avoir plusieurs lignes
    public function ligne()
    {
        return $this->hasMany(Ligne::class);
    }
}