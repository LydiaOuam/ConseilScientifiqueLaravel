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
                         ->get();

   
        return view('/DSession.accueilCSD',compact('current_user','users'));


    }

    public function save(Request $request)
    {
        dd($request->all());
    }
}
