<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;


    protected $fillable = [

            'nom_visiteur',
             'type_visiteur',
             'status_visiteur',
             'nombre_modification_visiteur',
             'prenom_visiteur',

   ];



}
