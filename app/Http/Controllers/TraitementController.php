<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requete;
use App\Models\Point;
use App\Models\Item;
use App\Models\Decision;
use Illuminate\Support\Facades\DB;
use App\Models\Detail;
use App\Models\User;
use App\Models\Jury;
use App\Models\Communication;
use App\Models\Publication;
use App\Models\SessionCSD;




class TraitementController extends Controller
{
    public function traiter()
    {
     
    
        $requetes = DB::table('requetes')
                         ->where('etat','=','en attente')
                         ->paginate(1);
        $juries = Jury::all();
        $details = Detail::all();
        $items = Item::all();
        $types = Point::all();

        return view('/DSession.session',compact('requetes','types','items','details','juries'));
    }

    public function traiter2()
    {
        //$currentDate = la date du systene;

        // $session_csd = DB::table('session_c_s_d_s')
        //                     ->where('etat_CSD','=','en attente')
        //                     ->where('dateSession','=',$currentDate);
        // if(count($session_csd)==0)
        //     return('DSession.AccueilCSD')->with('error',"Aucune session n'a ete planifier pour ce jour");

        $requetes = DB::table('requetes')
                    ->join('details','requetes.idRequete','=','details.idRequete')
                    ->join('users','requetes.idUser','=','users.id')
                    ->join('departements','users.idDept','=','departements.idDept')
                    ->paginate(1);
        $juries = Jury::all();
        $details = Detail::all();
        $items = Item::all();
        $types = Point::all();
        $communications = Communication::all();
        $publications = Publication::all();
        $decisions = DB::table('decisions')
                        ->join('users','decisions.idPresident','=','users.id')
                        ->get();

                        $current_user = session('user')->idDept;

        $users = DB::table('users')
                    ->where('idDept','=',$current_user)
                    ->where('fonction','!=','Etudiant-doctorant')
                    ->get();
                
        //faut mettre a jour l'etat de la session
        
    // $session = SessionCSD :: find($session_csd->idSessionCSD);


    // DB::update('update session_c_s_d_s set etatCSD = ? where id = ?',
    // ["en cours",$session_csd->idSessionCSD]);
    

        
        return view('/DSession.sessionCSD',compact('requetes','types','items','details','juries','decisions','communications','publications','users','current_user'));
    }

    public function traiter3()
    {

        $requetes = DB::table('requetes')
                    ->join('details','requetes.idRequete','=','details.idRequete')
                    ->join('users','requetes.idUser','=','users.id')
                    ->join('departements','users.idDept','=','departements.idDept')
                    ->where('requetes.type','=','4')
                    ->where('details.typeDoctorat','=','LMD')
                    ->paginate(1);

                    // dd($requetes);

        $details = Detail::all();
        $communications = Communication::all();
        $publications = Publication::all();
        $juries = Jury::all();
        $items = Item::all();
        $types = Point::all();
        return view('/DSession.sessionCFD',compact('requetes','types','items','details','juries','communications','publications'));
    }


    public function list( $id)
    {
        $items = Item::where('idItem',$id)->get();

        // dd($items);
        return view('list',compact('items'));
    }
    
    public function decision(Request $request,$id)
    {
        // dd($id);

        $jury = DB::table('juries')->where('idRequete','=',$id)->delete();
        // dd($request->all());


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
            $invite->qualite = "Invité";            
            $invite->grade = $request->gradeInvite[$i];            
            $invite->organisme = $request->organismeInvite[$i];    
            $invite->save();
        }
            
    }

        //Mettre a jour la decesion
        // $current_user = session('user')->id;
        // $decision = table('decisions')
                    // ->where('idPresident','=',$current_user);

        // if(count($decision)!=0)
        // {
        //     DB:update('update decisions set avis = ?, observation = ? where idDecision = ?',
        //     [$request->decision,$request->observation,$decision->idDecision]);
        // }

        $decision = new Decision();
        $decision->idRequete = $id;
        $user = session('user');
        $decision->idPresident = $user->id;//session('user')->id;
        $decision->avis = $request->decision;
        $decision->observation = $request->observation;
        $decision->save();
        return redirect()->back()->with('success','La décision a été bien enregistrée');
    }

}
