<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandant extends Model
{
    use HasFactory;

    protected $fillable = [

        'lastname',

        'firstname',

        'user_id',

        // 'took_date',
    ];


}
