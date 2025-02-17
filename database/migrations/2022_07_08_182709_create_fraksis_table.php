<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fraksis', function (Blueprint $table) {
            $table->id();
            $table->string('fraksi')->nullable();
            $table->string('slugfraksi')->nullable();
            $table->binary('logofraksi')->nullable();
            $table->foreignId('iduser');
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
        Schema::dropIfExists('fraksis');
    }
}
