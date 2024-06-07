<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTatatertipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tatatertips', function (Blueprint $table) {
            $table->id();
            $table->binary('fileperaturan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('slugkategori')->nullable();
            $table->foreignId('iduser')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tatatertips');
    }
}
