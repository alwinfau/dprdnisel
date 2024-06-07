<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirKunjungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir_kunjungans', function (Blueprint $table) {
            $table->id();
            $table->string('instansi')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kategorikunjungan')->nullable();
            $table->string('kepada')->nullable();
            $table->string('akd')->nullable();
            $table->longText('keterangankunjungan')->nullable();
            $table->integer('jumlahrombongan')->nullable();
            $table->date('tglkedatangan')->nullable();
            $table->time('jam')->nullable();
            $table->binary('dokumenkunjungan')->nullable();
            $table->string('koordinator')->nullable();
            $table->string('noponsel', '12')->nullable();
            $table->string('statuskunjungan')->nullable();
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
        Schema::dropIfExists('formulir_kunjungans');
    }
}
