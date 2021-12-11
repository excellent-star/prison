<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;



    protected $fillable = [

        'enregistreur_id',
        'service_id',
        'type',
        'date_visite',
        'nom_visiteur',
        'prenom_visiteur',
        'contact_visiteur',
        'quartier_visiteur',
        'lien_avec_visite',
        'numero_piece_visiteur',
        'type_piece',
        'fonction_visteur',
        'nationalite_visiteur',
        'nom_visite',
        'prenom_visite',
        'grade_visite',
        'quartier_ecroue',
        'heure_entree',
        'heure_sortie'






   ];



}
