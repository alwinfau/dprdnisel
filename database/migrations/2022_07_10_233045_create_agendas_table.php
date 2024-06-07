<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('namaagenda')->nullable();
            $table->string('slug')->nullable();
            $table->timestamp('tglagenda')->nullable();
            $table->longText('deskripsiagenda')->nullable();
            $table->enum('kategoriagenda', ['Agenda DPRD', 'Agenda Sekretariat'])->nullable();
            $table->string('lokasi')->nullable();
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
        Schema::dropIfExists('agendas');
    }
}
