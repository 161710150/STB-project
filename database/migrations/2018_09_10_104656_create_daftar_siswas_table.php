<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nama_Siswa');
            $table->string('Kelas');
            $table->string('Jurusan');
            $table->integer('nilai1');
            $table->integer('nilai2');
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
        Schema::dropIfExists('daftar_siswas');
    }
}
