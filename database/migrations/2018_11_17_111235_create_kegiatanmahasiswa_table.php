<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanmahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatanmahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uploaderId');
            $table->string('namaAcara', 100);
            $table->string('temaAcara', 50);
            $table->date('tanggalAcara');
            $table->string('tempatAcara', 100);
            $table->string('fileName', 100);
            $table->integer('anggaran');
            $table->string('pathFile', 100);
            $table->boolean('status')->default('0');
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
        Schema::dropIfExists('kegiatanmahasiswa');
    }
}
