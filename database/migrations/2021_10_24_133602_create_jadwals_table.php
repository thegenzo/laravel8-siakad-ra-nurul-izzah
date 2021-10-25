<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();

            // relasi tabel jadwals dan haris
            $table->unsignedBigInteger('id_hari');
            $table->foreign('id_hari')->references('id')->on('haris')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi tabel jadwals dan kelas
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi tabel jadwals dan mapels
            $table->unsignedBigInteger('id_mapel');
            $table->foreign('id_mapel')->references('id')->on('mapels')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi tabel jadwals dan gurus
            $table->unsignedBigInteger('id_guru');
            $table->foreign('id_guru')->references('id')->on('gurus')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->time('jam_mulai');
            $table->time('jam_selesai');

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
        Schema::dropIfExists('jadwals');
    }
}
