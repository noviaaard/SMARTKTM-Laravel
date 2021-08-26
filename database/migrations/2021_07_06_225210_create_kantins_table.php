<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKantinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kantins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mhs_id')->index();
            $table->unsignedBigInteger('penjual_id')->index();
            $table->string('no_kartu');
            $table->datetime('jam_transaksi');
            $table->timestamps();

            $table->foreign('mhs_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('penjual_id')->references('id')->on('penjual')->onDelete('cascade')->onUpdate('cascade');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kantins');
    }
}
