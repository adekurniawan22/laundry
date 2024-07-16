<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->Integer('id_user');
            $table->Integer('id_pelanggan')->nullable();
            $table->Integer('id_cabang');
            $table->date('tgl_transaksi');
            $table->date('tgl_selesai')->nullable();
            $table->string('status', 255);

            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            // $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans')->onDelete('set null');
            // $table->foreign('id_cabang')->references('id_cabang')->on('cabangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
