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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('image');
            $table->string('description');
            // sering digunakan dalam pemrograman untuk merepresentasikan bilangan bulat (integer) yang tidak memiliki tanda (sign), artinya hanya mewakili nilai positif atau nol.
            $table->unsignedBigInteger('id_category');
            $table->timestamps();

            $table->foreign('id_category')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
