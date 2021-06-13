<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdreDuJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordre_du_jours', function (Blueprint $table) {
            $table->id('idOrdre');
            $table->unsignedBigInteger('idSessionCSF'); 
            $table->foreign('idSessionCSF')
                  ->references('idSessionCSF')->on('session_c_s_f_s')
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
        Schema::dropIfExists('ordre_du_jours');
    }
}
