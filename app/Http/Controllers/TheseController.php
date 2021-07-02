<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TheseController extends Controller
{
   public function searchDossier()
   {

    $currentUser = session('user')->name." ".session('user')->fname;
    $currentUser2 = session('user')->fname." ".session('user')->name;

        $resultats = DB::table('details')
        ->where('nomPrenomDirecteur',$currentUser)
        ->orWhere('nomPrenomDirecteur',$currentUser2)
        ->select('idRequete')
        ->get();

        foreach($resultats as $resultat)
        {
            $requetes = DB::table('requetes')
            ->where('idRequete',$resultat->idRequete)
            ->where('type','=','4')
            ->get();
            foreach ($requetes as $requete)
            {
                $users = DB::table('users')
                ->where('id',$requete->idUser)
                ->select('id','name','fname')
                ->get();
                foreach($users as $u)
                     $user[] = (array)$u;
            }
    
        }
       


        return view('Requetes.selectionnerDossier',compact('user'));




   }

   public function postDossier($id)
   {
       return view('Requetes.soutenanceDirecteur');
   }

   

}
