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
        if(!Schema::hasTable('carts')){
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('qty');
            $table->string('price',20);
            $table->string('total',20);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('customer_id')
            ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')
            ->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
