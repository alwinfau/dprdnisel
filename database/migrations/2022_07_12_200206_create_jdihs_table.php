<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJdihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jdihs', function (Blueprint $table) {
            $table->id();
            $table->string('juduljdih')->nullable();
            $table->string('slugjdih')->nullable();
            $table->longText('deksripsijdih')->nullable();
            $table->integer('dilihat');
            $table->integer('didownload');
            $table->string('status')->nullable();
            $table->binary('filejdih')->nullable();
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
        Schema::dropIfExists('jdihs');
    }
}
