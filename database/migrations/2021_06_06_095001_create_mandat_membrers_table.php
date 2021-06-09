<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandatMembrersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandat_membrers', function (Blueprint $table) {
            $table->unsignedBigInteger('idMandat'); 
            $table->foreign('idMandat')
                  ->references('idMandat')->on('mandats')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('idMembre'); 
            $table->foreign('idMembre')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->primary(['idMandat', 'idMembre']);
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
        Schema::dropIfExists('mandat_membrers');
    }
}
