<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisiteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enregistreur_id');
            $table->foreign('enregistreur_id')->references('id')->on('enregistreurs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('type')->default(0); // 0 for personnel and 1 for ecroue
            $table->date('date_visite');
            $table->string('nom_visiteur');
            $table->string('prenom_visiteur');
            $table->string('contact_visiteur');
            $table->string('quartier_visiteur');
            $table->string('lien_avec_visite');
            $table->string('numero_piece_visiteur');
            $table->string('type_piece');
            $table->string('fonction_visteur')->nullable();
            $table->string('nationalite_visiteur');
            $table->string('nom_visite');
            $table->string('prenom_visite');
            $table->string('grade_visite')->nullable();
            $table->string('quartier_ecroue')->nullable();
            $table->string('heure_entree');
            $table->string('heure_sortie');
            $table->integer('number_of_time_updated');
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
        Schema::dropIfExists('visiteurs');
    }
}
