<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparansiAnggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transparansi_anggarans', function (Blueprint $table) {
            $table->id();
            $table->string('judulanggaran')->nullable();
            $table->string('kategorianggaran')->nullable();
            $table->string('slug_kategorianggaran')->nullable();
            $table->binary('dokumenanggaran')->nullable();
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
        Schema::dropIfExists('transparansi_anggarans');
    }
}
