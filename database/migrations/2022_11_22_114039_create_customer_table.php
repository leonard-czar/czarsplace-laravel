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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id');
            $table->string('firstname',100);
            $table->string('lastname',100);
            $table->string('email',150);
            $table->string('telephone',20);
            $table->enum('gender', ['male', 'female']);
            $table->string('address',200);
            $table->string('address2',200)->nullable();
            $table->string('password',200);
            $table->timestamps();
            $table->foreign('state_id')
     ->references('id')->on('state')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
