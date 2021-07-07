<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Presence;
use App\Models\SessionCSD;


class AbsenceController extends Controller
{
    public function membres()
    {

        $current_session = DB::table('session_c_s_d_s')
                            ->where('etatCSD','=','en cours');
        if(count($current_session) == 1)
            return redirect(route('sessionCSD'));



        $current_user = session('user')->idDept;
        $current_user_membre = session('user')->membre;

            
        $users = DB::table('users')
                         ->where('idDept','=',$current_user)
                         ->where('membre','=',$current_user_membre)
                         ->get();

   
        return view('/DSession.accueilCSD',compact('current_user','users'));


    }

    public function save(Request $request)
    {
        $nbr = count($request->all());
        for($i = 0; $i < $nbr - 1;$i++)
        {
            $etat = "etat"."$i";
            $string = $request->$etat;
            $arr = explode(",",$string);

            $presence = new Presence();
            $presence->etat = $arr[0];
            $presence->idUser = $arr[1];
            $presence->idSessionCSD = 10;
            $presence->save();
            
        }
        return redirect(route('sessionCSD'));


    }
}
