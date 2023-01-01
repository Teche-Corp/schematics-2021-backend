<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id('anggota_id');
            $table->UnsignedBigInteger('team_id')->indexed();
            $table->UnsignedBigInteger('user_id');
            $table->string('anggota_nisn',20);
            $table->string('anggota_alamat',100);
            $table->string('anggota_id_line',20)->nullable();
            $table->string('anggota_id_facebook',50)->nullable();
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
        Schema::dropIfExists('anggota');
    }
}
