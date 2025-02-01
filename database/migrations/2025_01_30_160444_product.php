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
        Schema::create('products', function (Blueprint $table) {
            $table->foreignId('product_id');
            $table->string('name');
            $table->string('category');
            $table->string('brand');
            $table->string('size');
            $table->string('color');
            $table->string('quantity');
            $table->string('price');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        // Schema::table('products', function(Blueprint $table){
           
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
