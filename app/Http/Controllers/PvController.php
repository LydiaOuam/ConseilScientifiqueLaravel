<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decision;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
use App\Models\Detail;
use App\Models\Jury;
use Illuminate\Support\Facades\Stroage;
use Barryvdh\DomPDF\Facade as PDF;

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
                        ->join('details','requetes.idRequete','=','details.idRequete')
                        ->join('users','requetes.idUser','=','users.id')
                        ->join('departements','users.idDept','=','departements.idDept')
                        ->get();
    
        // $requetes = DB::table('requetes')
        //                 ->join('details','requetes.idRequete','=','details.idRequete')
        //                 ->join('users','requetes.idUser','=','users.id')
        //                 ->join('departements','users.idDept','=','departements.idDept')
        //                 ->paginate(1);
            
        $juries = Jury::all();
        $details = Detail::all();
        $types = Point::all();
        
        foreach($requetes as $requete)
        {
            $array_points[] = $requete->nom;
            $array_unique_points = array_unique($array_points);
            

        }    

        $dec = Decision::all();
        return view('decision',compact('dec','session_csd','chef_departement','presence','requetes'
        ,'array_unique_points','juries','details','types'));
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
                        ->join('details','requetes.idRequete','=','details.idRequete')
                        ->join('users','requetes.idUser','=','users.id')
                        ->join('departements','users.idDept','=','departements.idDept')
                        ->get();

        $juries = Jury::all();
        $details = Detail::all();
        $types = Point::all();

                    foreach($requetes as $requete)
                    {
                        $array_points[] = $requete->nom;
                        $array_unique_points = array_unique($array_points);
                        
            
                    }    
            

        $pdf = PDF::loadView('decision',compact('dec','session_csd','chef_departement','presence','requetes','array_unique_points'
        ,'juries','details','types'));
        // $location = public_path('PVs/pv.pdf');
        // $filename = 'decision.pdf';
        // return response()->download($location,$filename);
        return $pdf->download('decision.pdf');
        
    }
}
