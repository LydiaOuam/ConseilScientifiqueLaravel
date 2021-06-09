<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;

class RequeteController extends Controller
{
    public function shoReq()
    {
        $points = Point::all();
        return view('Requetes.choisirReq',compact('points'));
      
    }

    public function choixReq(Request $req)
    {
        if($req->typereq == 10)
        {
            return 'HI';
        }
        // dd($req->typereq);

    }
}
