<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function revenirAccueil()
    {
        $user = session('user');
        $role =$user->roles;
        dd($role); 
    }
}
