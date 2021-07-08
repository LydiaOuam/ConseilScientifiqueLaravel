<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Presence;
use App\Models\SessionCSD;
use Carbon\Carbon;



class AbsenceController extends Controller
{
    public function membres()
    {
                

        $current_user = session('user')->idDept;

        $current_user_membre = session('user')->membre;

            
        $users = DB::table('users')
                         ->where('idDept','=',$current_user)
                         ->where('membre','=',$current_user_membre)
                         ->get();

        $current_session = DB::table('session_c_s_d_s')
                            ->where('etat_CSD','=','en cours')
                            ->get();
        if(count($current_session) == 1)
            return redirect(route('sessionCSD'));

            $currentDate = Carbon::now()->format('Y-m-d');
        
        $session_csd = DB::table('session_c_s_d_s')
                            ->where('etat_CSD','=','en attente')
                            ->where('dateSession','=',$currentDate)
                            ->get();

        // // dd($session_csd);
        // if(count($session_csd)==0)
        // {

        // }
        //                 return view('/DSession.accueilCSD',compact('current_user','users'))->with('error','Y a pas de session pour cette date');
                

               
 
        return view('/DSession.accueilCSD',compact('current_user','users','session_csd'));


    }

    public function save(Request $request)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        
        $session_csd = DB::table('session_c_s_d_s')
                            ->where('etat_CSD','=','en attente')
                            ->where('dateSession','=',$currentDate)
                            ->get();
                            foreach($session_csd as $session)
                            $idSess = $session->idSessionCSD;
                    
        $nbr = count($request->all());
        for($i = 0; $i < $nbr - 1;$i++)
        {
            $etat = "etat"."$i";
            $string = $request->$etat;
            $arr = explode(",",$string);

            $presence = new Presence();
            $presence->etat = $arr[0];
            $presence->idUser = $arr[1];
            $presence->idSessionCSD = $idSess;
            $presence->save();
            
        }
 
                    
                            DB::update('update session_c_s_d_s set etat_CSD = ? where idSessionCSD = ?',
                            ["en cours",$idSess]);
                    

        return redirect(route('sessionCSD'));


    }
}
