<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandats', function (Blueprint $table) {
            $table->id('idMandat');
            $table->date('dateDeb')->unique();
            $table->date('dateFin')->unique();
            $table->boolean('etat');
            $table->unsignedBigInteger('presidentCSF'); 
            $table->foreign('presidentCSF')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('mandats');
    }
}
