<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pays;

class PaysController extends Controller
{
    public function pays()
    {
        $pays = Pays::all();
        return view('Requetes.sejourScient',compact('pays'));
    }

    public function paysAnn()
    {
        $pays = Pays::all();
        return view('Requetes.annesabb',compact('pays'));
    }
}
