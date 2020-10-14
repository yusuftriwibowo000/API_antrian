<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTableAntrian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_antrian', function (Blueprint $table) {
            $table->integer('id_teller')->after('id_users');
            $table->dateTime('tgl_selesai')->after('tgl_antrian');
            $table->dropColumn('id_karyawan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_antrian', function (Blueprint $table) {
            //
        });
    }
}
