<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionCSDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_c_s_d_s', function (Blueprint $table) {
            $table->id('idSessionCSD');
            $table->unsignedBigInteger('idSessionCSF'); 
            $table->foreign('idSessionCSF')
                  ->references('idSessionCSF')->on('session_c_s_f_s')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('idPresidentCSD'); 
            $table->foreign('idPresidentCSD')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->date('dateSession');
            $table->date('dateLimite');
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
        Schema::dropIfExists('session_c_s_d_s');
    }
}
