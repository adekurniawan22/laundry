<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->integer('id_role');
            $table->integer('id_cabang');
            $table->string('nama', 255);
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('no_hp', 25);
            $table->string('alamat', 255);
            $table->string('foto', 255)->nullable();
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
