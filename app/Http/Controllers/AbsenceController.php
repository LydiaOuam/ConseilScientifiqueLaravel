<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AbsenceController extends Controller
{
    public function membres()
    {

        $current_user = session('user')->idDept;

            
        $users = DB::table('users')
                         ->where('idDept','=',$current_user)
                         ->where('fonction','!=','Etudiant-doctorant')
                         ->get();

   
        return view('/DSession.accueilCSD',compact('current_user','users'));


    }

    public function save(Request $request)
    {
        $nbr = count($request->all());
        for($i = 0; $i < $nbr;$i++)
        {
            $etat = "etat"."$i";
            $string = $request->$etat;
            $arr = explode(",",$string);
            foreach($arr as $ar)
            {
                
            }

        }
    }
}
