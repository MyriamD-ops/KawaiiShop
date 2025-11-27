<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lignes', function (Blueprint $table) {
             $table->id();
            $table->foreignId('products_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('orders_id')->constrained('orders')->onDelete('cascade');
            $table->integer('quantite');
            $table->float('montant',8,2);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lignes');
    }
};
