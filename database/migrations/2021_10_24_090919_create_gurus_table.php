<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();

            // relasi tabel gurus dan users
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->enum('jk', ['L', 'P']);
            $table->string('agama');
            $table->string('nip')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('no_hp');

            // relasi tabel gurus dan kelas
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->enum('status_kepegawaian', ['1', '0']);
            
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
        Schema::dropIfExists('gurus');
    }
}
