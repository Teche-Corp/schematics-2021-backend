<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_voucher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->string('kode_voucher');
            $table->timestamps();

            $table->foreign('team_id')->references('team_id')->on('teams');
            $table->foreign('kode_voucher')->references('kode_voucher')->on('voucher');
            $table->unique(['team_id', 'kode_voucher']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applied_voucher');
    }
}
