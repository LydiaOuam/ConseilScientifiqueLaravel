<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Model
{
    use LaratrustUserTrait;
    protected $fillable = [
        'login',
        'password',
        'name',
        'fname',
        'adress',
        'dateBirth',
        'placeBirth',
        'TeNumber1',
        'TeNumber2',
        'email2',
        'TeachGrade',  
        'searchGrade',
        'etat',
        'fonction',
        'genre'
    ];
}
