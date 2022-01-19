<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('murids', function (Blueprint $table) {
            $table->id();

            // relasi tabel murids dan users
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('nisn')->unique();
            $table->string('nis')->unique();
            $table->string('nik')->unique();
            $table->enum('jk', ['L', 'P']);
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            // relasi tabel murids dan kelas
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('pendidikan_ayah');
            $table->string('pendidikan_ibu');

            $table->text('alamat');
            $table->enum('status_lulus', ['1', '0']);
            $table->string('no_hp');
            $table->string('tahun_lulus')->nullable();

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
        Schema::dropIfExists('murids');
    }
}
