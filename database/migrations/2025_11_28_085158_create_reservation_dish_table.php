<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservation_dish', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained()->onDelete('cascade');
            $table->foreignId('dish_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->text('special_requests')->nullable();
            $table->timestamps();

            // Assure l'unicité de la combinaison reservation-dish
            $table->unique(['reservation_id', 'dish_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservation_dish');
    }
};
