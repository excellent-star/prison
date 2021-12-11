<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enregistreur_id');
            $table->foreign('enregistreur_id')->references('id')->on('enregistreurs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('brigade_agent_enregistreur');
            $table->string('domiciliation_enregistreur');
            $table->date('debut_permanence');
            $table->date('fin_permanence');
            $table->string('nom_commandant_brigade');
            $table->string('prenom_commandant_brigade');
            $table->string('grade_commandant_brigade');
            $table->string('nom_chef_post');
            $table->string('prenom_chef_post');
            $table->string('grade_chef_post');
            $table->string('fonction_enregistreur');
            $table->boolean('profile_complete')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('profiles');
    }
}
