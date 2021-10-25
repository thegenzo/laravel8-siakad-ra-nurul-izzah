<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkskulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekskuls', function (Blueprint $table) {
            $table->id();
            
            // relasi tabel nilais dan murids
            $table->unsignedBigInteger('id_murid');
            $table->foreign('id_murid')->references('id')->on('murids')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi tabel nilais dan kelas
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi tabel nilais dan gurus
            $table->unsignedBigInteger('id_guru');
            $table->foreign('id_guru')->references('id')->on('gurus')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('kegiatan_ekskul');
            $table->enum('hasil', ['B', 'C', 'K']);
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
        Schema::dropIfExists('ekskuls');
    }
}
