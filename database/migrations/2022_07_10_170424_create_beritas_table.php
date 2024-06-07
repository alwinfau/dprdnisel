<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->text('judulberita')->nullable();
            $table->text('slug')->nullable();
            $table->string('deskripsisingkat', 200)->nullable();
            $table->longText('deskripsi')->nullable();
            $table->bigInteger('dilihat')->nullable();
            $table->bigInteger('dibagikan')->nullable();
            $table->binary('gambarberita')->nullable();
            $table->enum('kategoriberita', ['Berita Umum', 'Berita Sekretariat']);
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
        Schema::dropIfExists('beritas');
    }
}
