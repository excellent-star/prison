<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enregistreur extends Model
{
    use HasFactory;


    protected $fillable = [

        'lastname',

        'firstname',

        'user_id',

        'rank',

        'status',

        'date_releve'

        // 'took_date',
    ];



}
