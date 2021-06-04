<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandat extends Model
{
    protected $fillable = [
        'dateDeb',
        'dateFin',
        'etat',
    ];
}
