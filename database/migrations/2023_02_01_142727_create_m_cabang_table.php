<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_cabang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_cabang',3);
            $table->string('nama_cabang');
            $table->string('alamat');
            $table->string('no_telp',14);
            $table->dateTime('created_date');
            $table->dateTime('updated_date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_cabang');
    }
};
