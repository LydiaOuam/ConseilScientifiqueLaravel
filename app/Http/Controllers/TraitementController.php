<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requete;
use App\Models\Point;


class TraitementController extends Controller
{
    public function traiter()
    {
        $requetes = Requete::paginate(1);
         
        $types = Point::all();
        return view('/DSession.session',compact('requetes','types'));
    }
}
