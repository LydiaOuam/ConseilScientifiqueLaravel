<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Mandat;
use App\Models\SessionCSF;
use App\Models\SessionCSD;
use App\Models\OrdreDuJour;
use App\Models\Requete;
use App\Models\OrdreDuJourPoint;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function allPoint()
    {
        $points = Point::all();
        return view('/DSession.planifier',compact('points'));
  
    }

    public function saveSess(Request $request)
    {

        $request->validate([
            'date_deb'=>'required',
        ]);
        
        if(isset( $_POST['choix']))
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

            return redirect(route('SessionCSF'))->with('success','La session CSF est enregistrée');
        }
        else return redirect(route('SessionCSF'))->with('error','Vous devez inclure au moins un point');
  
    }


    /** --------------------------------------------------------------------------------
     *                      Session CSD
     * ---------------------------------------------------------------------------------
     */

    public function saveSessCSD(Request $request)
    {   

      
        $sessions = SessionCSF::all();
        $last_session_object = collect($sessions)->last(); 

        $request->validate([
            'date_deb'=>'required',
            'date_limite'=>'required',
        ]);

        $datesess = $last_session_object->dateSesCSF;
        $dateLim = date('Y-m-d', strtotime($datesess. ' -3 days'));
        $dateLimDEp = date('Y-m-d', strtotime($datesess. ' -7 days'));


        if($request->date_deb>$dateLim)
            return redirect(route('planiCsd'))->with('error',"Impossible de planifier la session CSD pour ce jour");
        if($request->date_limite>=$dateLimDEp)
            return redirect(route('planiCsd'))->with('error',"Impossible de fixer cette date limite ");

        $sessionCSD = new SessionCSD();

        $sessionCSD->idSessionCSF = $last_session_object->idSessionCSF;
        $sessionCSD->idPresidentCSD = session('user')->id;
        $sessionCSD->dateLimite = $request->date_limite;
        $sessionCSD->dateSession = $request->date_deb;
        $sessionCSD->save();
 
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last(); 


        $requetes = Requete::all();

        foreach($requetes as $requete)
        {
            if($requete->idSession == null)
            {
                // $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                Requete::where('idRequete',$requete->idRequete)
                            ->update(['idSession'=>$last_sessionCsd_object->idSessionCSD]);
                // DB::update('requetes set idSession = ? where idRequete = ?',[$last_sessionCsd_object->idSessionCSD,$requete->idRequete]);
            }
        }

        
        return redirect(route('planiCsd'))->with('success',"La session a ete bien cree ");


    }
}
