<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->increments('id_users');
            $table->integer('id_role', 1);
            $table->string('nama_lengkap', 50);
            $table->enum('jenis_kelamin', array('Laki-laki','Perempuan'));
            $table->date('tgl_lahir');
            $table->string('alamat', 100);
            $table->string('NIK', 16);
            $table->date('tgl_buat');
            $table->date('start_login');
            $table->date('end_login');
            $table->string('username', 10);
            $table->string('password', 100);
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
        Schema::dropIfExists('tb_users');
    }
}
