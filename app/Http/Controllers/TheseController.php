<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jury;

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

        $requete = DB::table('requetes')
        ->where('idUser','=',$id)
        ->where('type','=','7')
        ->select('idRequete')
        ->get();
        if(count($requete)>0){
            foreach($requete as $req)
            $idRequete = $req->idRequete;
                
            $details = DB::table('details')
            ->where('id','=',$idRequete)
            ->get();
            return view('Requetes.soutenanceDirecteur',compact('details'));

        }
            return "pas de dossier soutenance";

   }

   public function saveJury(Request $request,$id)
   {
    // dd($request->all());

    //    dd($id);

    $jury = new Jury();

    $jury->nom = $request->nompresident;
    $jury->idRequete = $id;
    $jury->prenom = $request->prenomPresident;            
    $jury->qualite = "Président";            
    $jury->grade = $request->GradePresident;            
    $jury->organisme = $request->organismePresident;    
    
    $jury->save();

    
    $jury = new Jury();

    $jury->nom = $request->nomDirecteur;
    $jury->idRequete = $id;
    $jury->prenom = $request->prenomDirecteur;            
    $jury->qualite = "Directeur de thèse";            
    $jury->grade = $request->GradeDirecteur;            
    $jury->organisme = $request->organismeDirecteur;    
    
    $jury->save();

    $jury = new Jury();

    $jury->nom = $request->nomCoDirecteur;
    $jury->idRequete = $id;
    $jury->prenom = $request->prenomCoDirecteur;            
    $jury->qualite = "Co-directeur de thèse";            
    $jury->grade = $request->GradeCoDirecteur;            
    $jury->organisme = $request->organismeCoDirecteur;    
    
    $jury->save();

    
    // for($i = 0; $i<$nombreCom;$i++)
    // {
    // $communication = new Communication();
      
    //     $communication->idRequete =  $req_last->idRequete;
    //     $communication->listeAuteurs =  $request->ListeAuteurCom[$i]; 
    //     $communication->titreCom =  $request->TitreCom[$i]; 
    //     $communication->intitCom =  $request->NomCom[$i]; 
    //     $communication->dateDebCom =  $request->DateDebCom[$i]; 
    //     $communication->dateFinCom =  $request->DateFinCom[$i]; 
    //     $communication->lieuCom =  $request->LieuCom[$i]; 
    //     $communication->urlCom =  $request->URLCom[$i]; 
    //     $communication->save();
    // }


   }
 

   

}
