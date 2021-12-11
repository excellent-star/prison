<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [

         'brigade_agent_enregistreur',
         'domiciliation_enregistreur',
         'debut_permanence',
         'fin_permanence',
         'nom_commandant_brigade',
         'prenom_commandant_brigade',
         'grade_commandant_brigade',
         'nom_chef_post',
         'prenom_chef_post',
         'grade_chef_post',
         'fonction_enregistreur',
         'enregistreur_id',
         'profile_complete',
         'status',


   ];


}
