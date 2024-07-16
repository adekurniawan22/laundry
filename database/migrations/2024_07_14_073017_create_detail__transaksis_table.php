<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail__transaksis', function (Blueprint $table) {
            $table->id('id_detail_transaksi');
            $table->Integer('id_transaksi');
            $table->Integer('id_kategori');
            $table->integer('jumlah');

            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksis')->onDelete('cascade');
            // $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail__transaksis');
    }
}
