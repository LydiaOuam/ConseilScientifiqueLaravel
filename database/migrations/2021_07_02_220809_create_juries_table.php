<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRequete'); 
            $table->foreign('idRequete')
                  ->references('idRequete')->on('requetes')
                  ->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('qualite');
            $table->string('grade');
            $table->string('organisme');
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
        Schema::dropIfExists('juries');
    }
}
