<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser'); 
            $table->foreign('idUser')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('idSessionCSD'); 
            $table->foreign('idSessionCSD')
                  ->references('idSessionCSD')->on('session_c_s_d_s')
                  ->onDelete('cascade');
            $table->enum('etatp',['Présent','Absence justifiée','Absent']);
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
        Schema::dropIfExists('presences');
    }
}
