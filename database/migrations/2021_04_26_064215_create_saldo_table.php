<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mhs_id')->unsigned();
            $table->string('saldoterpakai');
            $table->integer('jml_saldo');
            $table->timestamps();
            
        });

        Schema::table('saldo', function (Blueprint $table) {
            $table->foreign('mhs_id')->references('id')->on('mahasiswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldo');
    }
}
