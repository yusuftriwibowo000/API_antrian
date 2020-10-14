<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTableLayanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_layanan', function (Blueprint $table) {
            // $table->integer('id_loket');
            $table->foreign('id_loket')
                  ->references('id_loket')->on('tb_loket')
                  ->onDelete('cascade')
                  ->onUpdate('restrict');;    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_layanan');
    }
}
