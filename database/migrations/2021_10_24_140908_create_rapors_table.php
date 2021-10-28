<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapors', function (Blueprint $table) {
            $table->id();

            // relasi tabel rapors dan murids
            $table->unsignedBigInteger('id_murid');
            $table->foreign('id_murid')->references('id')->on('murids')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi tabel rapors dan kelas
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // // relasi tabel rapors dan gurus
            // $table->unsignedBigInteger('id_guru');
            // $table->foreign('id_guru')->references('id')->on('gurus')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // // relasi tabel rapors dan mapels
            // $table->unsignedBigInteger('id_mapel');
            // $table->foreign('id_mapel')->references('id')->on('mapels')->constrained()->onDelete('cascade')->onUpdate('cascade');

            
            $table->double('nem');
            $table->string('predikat');
            $table->text('deskripsi');
            $table->string('status');
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
        Schema::dropIfExists('rapors');
    }
}
