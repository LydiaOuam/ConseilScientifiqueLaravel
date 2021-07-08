<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decision;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PvController extends Controller
{
    public function decision()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        
        $session_csd = DB::table('session_c_s_d_s')
                            ->where('etat_CSD','=','en cours')
                            ->where('dateSession','=',$currentDate)
                            ->get();
        foreach($session_csd as $session)
        {
            $idSess = $session->idSessionCSD;
            $idSessCSF = $session->idSessionCSF;
            $idPresident  = $session->idPresidentCSD;
        }
        $chef_departement = DB::table('users')
                            ->where('id','=',$idPresident)
                            ->join('departements','users.idDept','=','departements.idDept')
                            ->get();

        $presence = DB::table('presences')
                        ->where('idSessionCSD','=',$idSess)
                        ->join('users','users.id','=','presences.idUser')
                        ->get();

        $requetes = DB::table('decisions')
                        ->where('idSessionCSD','=',$idSess)
                        ->join('requetes','requetes.idRequete','=','decisions.idRequete')
                        ->join('points','requetes.type','=','points.id')
                        ->get();
        
        foreach($requetes as $requete)
        {
            $array_points[] = $requete->nom;
            $array_unique_points = array_unique($array_points);
            

        }    

        $dec = Decision::all();
        return view('decision',compact('dec','session_csd','chef_departement','presence','requetes','array_unique_points'));
    }

/**--------------------------------------------------------------------------------------------
 * ---------------------------------------------------------------------------------------------
 */




    public function downdecision()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        
        $session_csd = DB::table('session_c_s_d_s')
                            ->where('etat_CSD','=','en cours')
                            ->where('dateSession','=',$currentDate)
                            ->get();
        foreach($session_csd as $session)
        {
            $idSess = $session->idSessionCSD;
            $idSessCSF = $session->idSessionCSF;
            $idPresident  = $session->idPresidentCSD;
        }
        $chef_departement = DB::table('users')
                            ->where('id','=',$idPresident)
                            ->join('departements','users.idDept','=','departements.idDept')
                            ->get();
        $dec = Decision::all();


        
        $presence = DB::table('presences')
                        ->where('idSessionCSD','=',$idSess)
                        ->join('users','users.id','=','presences.idUser')
                        ->get();

                        
        $requetes = DB::table('decisions')
                    ->where('idSessionCSD','=',$idSess)
                    ->join('requetes','requetes.idRequete','=','decisions.idRequete')
                    ->join('points','requetes.type','=','points.id')
                    ->get();

                    foreach($requetes as $requete)
                    {
                        $array_points[] = $requete->nom;
                        $array_unique_points = array_unique($array_points);
                        
            
                    }    
            

        $pdf = PDF::loadView('decision',compact('dec','session_csd','chef_departement','presence','requetes','array_unique_points'));
        return $pdf->download('decision.pdf');
    }
}
