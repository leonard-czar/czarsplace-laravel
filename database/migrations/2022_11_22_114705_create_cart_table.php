<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->string('qty');
            $table->string('price',20);
            $table->string('total',20);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->foreign('customer_id')
            ->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('product_id')
            ->references('id')->on('products')->onDelete('cascade');
        });
    

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('cart');
    }
};
