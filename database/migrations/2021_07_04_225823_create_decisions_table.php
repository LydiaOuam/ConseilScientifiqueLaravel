<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decisions', function (Blueprint $table) {
            $table->id('idDecision');
            $table->unsignedBigInteger('idRequete'); 
            $table->foreign('idRequete')
                  ->references('idRequete')->on('requetes')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('idSessionCSD'); 
            $table->foreign('idSessionCSD')
                    ->references('idSessionCSD')->on('session_c_s_d_s')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('idSessionCSF'); 
            $table->foreign('idSessionCSF')
                    ->references('idSessionCSF')->on('session_c_s_f_s')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('idPresident'); 
            $table->foreign('idPresident')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->string('avis');
            $table->text('observation')->nullable();
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
        Schema::dropIfExists('decisions');
    }
}
