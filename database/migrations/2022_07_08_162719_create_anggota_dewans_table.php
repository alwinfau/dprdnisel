<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaDewansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_dewans', function (Blueprint $table) {
            $table->id();
            $table->string('namadewan')->nullable();
            $table->string('slugnama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('periode')->nullable();
            $table->string('tmptlahir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->foreignId('idfraksi')->nullable();
            $table->string('jabatandifraksi')->nullable();
            $table->foreignId('iddapil')->nullable();
            $table->foreignId('idakd')->nullable();
            $table->string('jabatandiakd')->nullable();
            $table->binary('fotodewan')->nullable();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('anggota_dewans');
    }
}
