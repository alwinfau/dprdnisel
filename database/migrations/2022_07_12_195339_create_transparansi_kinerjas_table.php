<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparansiKinerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transparansi_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->string('judulkinerja')->nullable();
            $table->string('kategorikinerja')->nullable();
            $table->string('slugkategorikinerja')->nullable();
            $table->binary('dokumenkinerja')->nullable();
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
        Schema::dropIfExists('transparansi_kinerjas');
    }
}
