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

        if(!Schema::hasTable('Recipes')){
            Schema::create('Recipes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('duration');

            });
        }
        Schema::create('RecipesxIngredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('recipe_id')->references('id')->on('Recipes');
            $table->foreign('ingredient_id')->references('id')->on('Ingredients');
            $table->integer('quantity');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Recipes');
        Schema::dropIfExists('RecipesxIngredients');
    }
};
