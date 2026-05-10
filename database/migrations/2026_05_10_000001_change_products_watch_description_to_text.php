<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Products.short descriptions were varchar(100); catalog copy often exceeds that.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('watch_description')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('watch_description', 100)->nullable()->change();
        });
    }
};
