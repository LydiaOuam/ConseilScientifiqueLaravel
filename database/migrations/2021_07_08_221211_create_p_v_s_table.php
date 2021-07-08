<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_v_s', function (Blueprint $table) {
            $table->id();
            $table->string('nomPDF');
            $table->unsignedBigInteger('idSessionCSD'); 
            $table->foreign('idSessionCSD')
                    ->references('idSessionCSD')->on('session_c_s_d_s')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('p_v_s');
    }
}
