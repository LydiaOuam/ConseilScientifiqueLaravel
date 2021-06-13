<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Mandat;
use App\Models\SessionCSF;
use App\Models\OrdreDuJour;
use App\Models\OrdreDuJourPoint;

class SessionController extends Controller
{
    public function allPoint()
    {
        $points = Point::all();
        return view('/DSession.planifier',compact('points'));
  
    }

    public function saveSess(Request $request)
    {
        $mandat = Mandat::where('etat','=',1)->first();
        $session = new SessionCSF();
        $session->idMandat = $mandat->idMandat;
        $session->dateSesCSF = $request->date_deb;
        $session->save();

        $sessions = SessionCSF::all();
        $last_session_object = collect($sessions)->last(); 
       
        $ordre = new OrdreDuJour();
        $ordre->idSessionCSF =  $last_session_object->idSessionCSF;
        $ordre->save();

        $ordres = OrdreDuJour::all();
        $last_ordres_object = collect($ordres)->last();
        

        $choix = $_POST['choix'];
        
        foreach($choix as $choice)
        {
            $ordre_point = new OrdreDuJourPoint();
            $ordre_point->idOrdre = $last_ordres_object->idOrdre;
            $ordre_point->idPoints = $choice;
            $ordre_point->save();
        }
    }
}
