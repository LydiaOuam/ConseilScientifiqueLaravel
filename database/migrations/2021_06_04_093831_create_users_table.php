<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('fname')->nullable();
            $table->text('adress')->nullable();
            $table->enum('genre',['HOMME','FEMME'])->nullable();
            $table->enum('fonction',['Etudiant-doctorant','Enseignant-chercheur','Enseignant','Chercheur'])->nullable();
            $table->date('dateBirth')->nullable();
            $table->string('placeBirth')->nullable();
            $table->string('TeNumber1')->nullable();
            $table->string('TeNumber2')->nullable();
            $table->string('email2')->nullable();
            $table->enum('TeachGrade',['Maître assistant A','Maître assistant B','Maître de conférence A','Maître de conférence B','Professeur'])->nullable();
            $table->enum('searchGrade',['Attaché de recherche','Chargé de recherche','Maître de recherche A','Maître de recherche B','Directeur de recherche'])->nullable();
            $table->boolean('etat')->default(1);
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('users');
    }
}
