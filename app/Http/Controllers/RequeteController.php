<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;

class RequeteController extends Controller
{
    public function shoReq()
    {
        $points = Point::where('id','<=',10)->get();
        return view('Requetes.choisirReq',compact('points'));
      
    }
    public function showReqEC()
    {
        $points = Point::where('id','<=',23)->get();
        return view('Requetes.espacEC',compact('points'));
      
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
