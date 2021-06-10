<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requetes', function (Blueprint $table) {
            $table->id('idRequete');
            $table->string('dateSoumission');
            $table->enum('etat',['en attente','en cours de traitement','traité'])->default('en attente');
            $table->unsignedBigInteger('type'); 
            $table->foreign('type')
                  ->references('id')->on('points')
                  ->onDelete('cascade');
            $table->string('idSession')->nullable();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('requetes');
    }
}
