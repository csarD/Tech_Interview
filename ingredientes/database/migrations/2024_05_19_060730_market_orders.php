<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('OrdersMarket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id');

            $table->foreign('ingredient_id')->references('id')->on('Ingredients');

            $table->integer('units');
            $table->timestamps( precision: 0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('OrdersMarket');
    }
};
