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
        Schema::create('Orders', function (Blueprint $table) {
            $table->id();

            $table->timestamps();

        });
        Schema::create('OrdersxRecipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('recipe_id')->references('id')->on('Recipes');
            $table->foreign('order_id')->references('id')->on('Orders');
            $table->integer('quantity')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Orders');
        Schema::dropIfExists('OrdersxRecipes');
    }
};
