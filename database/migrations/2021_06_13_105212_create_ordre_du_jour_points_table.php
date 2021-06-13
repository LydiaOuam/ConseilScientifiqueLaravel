<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdreDuJourPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordre_du_jour_points', function (Blueprint $table) {
            $table->unsignedBigInteger('idPoints'); 
            $table->foreign('idPoints')
                  ->references('id')->on('points')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('idOrdre'); 
            $table->foreign('idOrdre')
                  ->references('idOrdre')->on('ordre_du_jours')
                  ->onDelete('cascade');
            $table->primary(['idPoints', 'idOrdre']);
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
        Schema::dropIfExists('ordre_du_jour_points');
    }
}
