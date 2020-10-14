<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAntrian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_antrian', function (Blueprint $table) {
            $table->increments('id_antrian');
            $table->integer('id_users');
            $table->date('tgl_antrian');
            $table->enum('status_antrian', array('Menunggu','Sudah Dilayani'));
            $table->integer('no_antrian');
            $table->integer('id_layanan');
            $table->integer('id_karyawan');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_antrian');
    }
}
