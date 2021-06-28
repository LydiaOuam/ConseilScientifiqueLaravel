<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRequete'); 
            $table->foreign('idRequete')
                  ->references('idRequete')->on('requetes')
                  ->onDelete('cascade');
            $table->text('listeAuteurs');
            $table->text('titrePub');
            $table->text('nomRevue')->nullable();
            $table->float('impact')->nullable();
            $table->float('sjr');
            $table->date('datesOum');
            $table->date('dateAcc');
            $table->date('dateParu')->nullable();
            $table->text('urlrevue');
            $table->text('urlpapier')->nullable();
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
        Schema::dropIfExists('publications');
    }
}
