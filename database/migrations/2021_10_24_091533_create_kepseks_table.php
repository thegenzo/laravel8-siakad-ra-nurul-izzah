<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepseksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepseks', function (Blueprint $table) {
            $table->id();

            // relasi tabel kepseks dan users
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->enum('jk', ['L', 'P']);
            $table->string('nip')->unique();
            $table->text('alamat');
            $table->string('no_hp');
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
        Schema::dropIfExists('kepseks');
    }
}
