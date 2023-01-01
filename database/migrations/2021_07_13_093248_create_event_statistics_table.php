<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total_pendaftaran')->default(0); // Akun Non-admin
            $table->decimal('total_pendapatan', 13, 3, true)->default(0);

            $table->unsignedBigInteger('total_tim_nlc_sudah_bayar')->default(0);
            $table->unsignedBigInteger('total_tim_nlc')->default(0);

            $table->unsignedBigInteger('total_tim_npc_junior_sudah_bayar')->default(0);
            $table->unsignedBigInteger('total_tim_npc_senior_sudah_bayar')->default(0);
            $table->unsignedBigInteger('total_tim_npc_junior')->default(0);
            $table->unsignedBigInteger('total_tim_npc_senior')->default(0);

            $table->unsignedBigInteger('total_tiket_nst_sudah_bayar')->default(0);
            $table->unsignedBigInteger('total_tiket_nst')->default(0);

            $table->unsignedBigInteger('total_tiket_reeva_sudah_bayar')->default(0);
            $table->unsignedBigInteger('total_tiket_reeva')->default(0);

            $table->decimal('total_pendapatan_nlc', 13, 3, true)->default(0);
            $table->decimal('total_pendapatan_npc_junior', 13, 3, true)->default(0);
            $table->decimal('total_pendapatan_npc_senior', 13, 3, true)->default(0);
            $table->decimal('total_pendapatan_nst', 13, 3, true)->default(0);
            $table->decimal('total_pendapatan_reeva', 13, 3, true)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_statistics');
    }
}
