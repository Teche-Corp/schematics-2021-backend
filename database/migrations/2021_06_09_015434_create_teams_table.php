<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            
            $table->id('team_id');
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('ketua_id')->indexed();
            
            $table->integer('status_id');
            $table->unsignedInteger('tahapan_id')->nullable();
            $table->unsignedInteger('bukti_bayar_id')->nullable();

            $table->string('team_name',100)->indexed();
            $table->enum('event', ['nlc', 'npc_junior', 'npc_senior']);
            $table->string('team_password');
            $table->string('team_institusi',50);
            
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
        Schema::dropIfExists('teams');
    }
}
