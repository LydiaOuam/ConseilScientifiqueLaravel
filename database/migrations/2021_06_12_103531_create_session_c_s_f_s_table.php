<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionCSFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_c_s_f_s', function (Blueprint $table) {
            
            $table->id('idSessionCSF');
            $table->unsignedBigInteger('idMandat'); 
            $table->foreign('idMandat')
                  ->references('idMandat')->on('mandats')
                  ->onDelete('cascade');
            $table->date('dateSesCSF');
            $table->enum('etat_CSF',['en attente','en cours','terminée']);
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
        Schema::dropIfExists('session_c_s_f_s');
    }
}
