<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktiPembayaranTimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_pembayaran_tim', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id')->indexed();
            $table->unsignedInteger('bukti_bayar_jumlah');
            $table->string('bukti_bayar_sumber', 10);
            $table->string('bukti_bayar_kode_voucher', 20);

            $table->string('bukti_bayar_url');

            $table->boolean('is_verified')->default(false);
            $table->string('bukti_bayar_keterangan')->nullable();
            $table->boolean('need_edit')->default(false);
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
        Schema::dropIfExists('bukti_pembayaran_tim');
    }
}
