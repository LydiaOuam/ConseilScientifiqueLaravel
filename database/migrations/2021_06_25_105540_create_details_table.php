<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRequete'); 
            $table->foreign('idRequete')
                  ->references('idRequete')->on('requetes')
                  ->onDelete('cascade');
            $table->string('nomPrenomCandidat')->nullable();
            $table->string('nomPrenomDirecteur')->nullable();
            $table->string('nomPrenomResSecondaire')->nullable();
            $table->string('annee')->nullable();
            $table->string('departement')->nullable();
            $table->string('intituleDesign')->nullable();
            $table->string('typeDoctorat')->nullable();
            $table->string('paysDestination')->nullable();
            $table->string('etablissementaAccueil')->nullable();
            $table->date('dateDeb')->nullable();
            $table->date('dateFin')->nullable();
            $table->string('diplomeAcc')->nullable();
            $table->string('gradeActuel')->nullable();
            $table->string('promotion')->nullable();
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
        Schema::dropIfExists('details');
    }
}
