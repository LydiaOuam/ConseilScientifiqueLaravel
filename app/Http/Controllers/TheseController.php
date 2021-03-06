<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jury;
use App\Models\Item;


class TheseController extends Controller
{
   public function searchDossier()
   {

    $currentUser = session('user')->name." ".session('user')->fname;
    $currentUser2 = session('user')->fname." ".session('user')->name;


        $resultats = DB::table('requetes')
        ->join('details','requetes.idRequete','=','details.idRequete')
        ->join('users','requetes.idUser','=','users.id')
        ->where('requetes.type','=','4')
        ->where('nomPrenomDirecteur','LIKE',$currentUser)
        ->orWhere('nomPrenomDirecteur',$currentUser2)
        ->where('requetes.type','=','4')
        ->get();

// dd($resultats);
        if(count($resultats) != 0)
        {
            return view('Requetes.selectionnerDossier',compact('resultats'));
        }
          
            echo '<script>
            alert( "Vous n\'avez pas de dossier de soutenance")
            </script>';
            echo '<script type="text/javascript">'
                , 'history.go(-1);'
                , '</script>';

   }

   public function postDossier($id)
   {

        $requete = DB::table('requetes')
        ->where('idUser','=',$id)
        ->where('type','=','4')
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
 

    // dd($id);


    $request->validate([
         
        'nompresident' => 'required',
        'prenomPresident' => 'required',            
        'GradePresident' => 'required',            
        'organismePresident' => 'required',   
        'nomDirecteur'=>'required',
        'prenomDirecteur'=>'required',            
        'GradeDirecteur'=>'required',        
        'organismeDirecteur'=>'required',  
        'nomCoDirecteur'=>'required',
        'prenomCoDirecteur'=>'required',            
        'GradeCoDirecteur'=>'required',            
        'organismeCoDirecteur'=>'required', 
        'nomExaminateur.*'=>'required',
        'prenomExaminateur.*'=>'required',            
        'gradeExaminateur.*'=>'required',            
        'organismeExaminateur.*'=>'required',    
    ]);
    


    //    dd($id);

    $jury = new Jury();

    $jury->nom = $request->nompresident;
    $jury->idRequete = $id;
    $jury->prenom = $request->prenomPresident;            
    $jury->qualite = "Pr??sident";            
    $jury->grade = $request->GradePresident;            
    $jury->organisme = $request->organismePresident;    
    
    $jury->save();

    
    $jury = new Jury();

    $jury->nom = $request->nomDirecteur;
    $jury->idRequete = $id;
    $jury->prenom = $request->prenomDirecteur;            
    $jury->qualite = "Directeur de th??se";            
    $jury->grade = $request->GradeDirecteur;            
    $jury->organisme = $request->organismeDirecteur;    
    
    $jury->save();

    $jury = new Jury();

    $jury->nom = $request->nomCoDirecteur;
    $jury->idRequete = $id;
    $jury->prenom = $request->prenomCoDirecteur;            
    $jury->qualite = "Co-directeur de th??se";            
    $jury->grade = $request->GradeCoDirecteur;            
    $jury->organisme = $request->organismeCoDirecteur;    
    
    $jury->save();

    $nombreExaminateur = count($request->nomExaminateur);
            
    // dd($nombreExaminateur);
    for($i = 0; $i<$nombreExaminateur;$i++)
    {
            $examinateur = new Jury();
      
        $examinateur->nom = $request->nomExaminateur[$i];
        $examinateur->idRequete = $id;
        $examinateur->prenom = $request->prenomExaminateur[$i];            
        $examinateur->qualite = "Examinateur";            
        $examinateur->grade = $request->gradeExaminateur[$i];            
        $examinateur->organisme = $request->organismeExaminateur[$i];    
        $examinateur->save();
    }

    
    $nombreInvites = count($request->nomInvite);
            
    // dd($nombreExaminateur);
    for($i = 0; $i < $nombreInvites;$i++)
    {
        if($request->nomInvite[$i] != null)
        {
            $invite = new Jury();
      
            $invite->nom = $request->nomInvite[$i];
            $invite->idRequete = $id;
            $invite->prenom = $request->prenomInvite[$i];            
            $invite->qualite = "Invit??";            
            $invite->grade = $request->gradeInvite[$i];            
            $invite->organisme = $request->organismeInvite[$i];    
            $invite->save();
        }
            
    }

        if($file = $request->rapport)
        {
            $name = $file->getClientOriginalName();
            if($file->move('upload',$name)){
            $item = new Item();
            $item->idRequete = $id;
            $item->fichier = $name;
            $item->save();
            }
        }


        echo '<script>
        alert( "Les jurys ont ??t?? bien enregistr?? ")
        </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-3);'
            , '</script>';



   }
 

   

}
