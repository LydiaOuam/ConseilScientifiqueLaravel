<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandatMembrer extends Model
{
    protected $fillable = [
        'idMandat',
        'idMembre',
    ];

}
