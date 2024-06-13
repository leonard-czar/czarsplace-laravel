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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->string('watch_name',100)->nullable();
            $table->string('watch_description',100)->nullable();
            $table->string('watch_price', 10, 2)->nullable();
            $table->string('collection',100)->nullable();
            $table->string('reference_number',100)->nullable();
            $table->string('case_description',100)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('movement',100)->nullable();
            $table->string('dial',100)->nullable();
            $table->string('Bezel',100)->nullable();
            $table->string('crystal',100)->nullable();
            $table->string('caliber',100)->nullable();
            $table->string('watch_function',100)->nullable();
            $table->string('mechanism',100)->nullable();
            $table->string('number_of_jewels',100)->nullable();
            $table->string('total_diameter',100)->nullable();
            $table->string('power_reserve',100)->nullable();
            $table->string('number_of_parts',100)->nullable();
            $table->string('frequency',100)->nullable();
            $table->string('bracelet',100)->nullable();
            $table->string('clasp',100)->nullable();
            $table->string('water_resistance',100)->nullable();
            $table->string('watch_image',100)->nullable();
            $table->timestamps();
            $table->foreign('brand_id')
            ->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
