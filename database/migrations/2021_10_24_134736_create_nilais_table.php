<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            
            // relasi tabel nilais dan murids
            $table->unsignedBigInteger('id_murid');
            $table->foreign('id_murid')->references('id')->on('murids')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi tabel nilais dan kelas
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // relasi tabel nilais dan mapels
            $table->unsignedBigInteger('id_mapel');
            $table->foreign('id_mapel')->references('id')->on('mapels')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->integer('tes1');
            $table->integer('tes2');
            $table->integer('tes3');
            $table->integer('tes4');
            $table->integer('tes5');

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
        Schema::dropIfExists('nilais');
    }
}
