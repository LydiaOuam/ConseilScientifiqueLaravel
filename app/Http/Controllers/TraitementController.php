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
use Carbon\Carbon;





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





        $current_user = session('user')->idDept;
        $current_user_membre = session('user')->membre;

            
        $users = DB::table('users')
                         ->where('idDept','=',$current_user)
                         ->where('membre','=',$current_user_membre)
                         ->get();


            // $currentDate = Carbon::now()->format('Y-m-d');
        
            // $session_csd = DB::table('session_c_s_d_s')
            //                     ->where('etat_CSD','=','en attente')
            //                     ->where('dateSession','=',$currentDate)
            //                     ->get();
            // foreach($session_csd as $session)
            //         $idSess = $session->idSessionCSD;

                    

            // DB::update('update session_c_s_d_s set etat_CSD = ? where idSessionCSD = ?',
            // ["en cours",$idSess]);

   



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

                            
                    

            $currentDate = Carbon::now()->format('Y-m-d');
        
            $session_csd = DB::table('session_c_s_d_s')
                                ->where('etat_CSD','=','en attente')
                                ->where('dateSession','=',$currentDate)
                                ->get();
            foreach($session_csd as $session)
                    {
                        $idSess = $session->idSessionCSD;
                        $idSessCSF = $session->idSessionCSF;
                    }


        return view('/DSession.sessionCSD',compact('session_csd','requetes','types','items','details','juries','decisions','communications','publications','users','current_user'));


                
  
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


        $requete = DB::table('requetes')->where('idRequete','=',$id)->get();
        foreach($requete as $req)
        {
            $type = $req->type;
        }
        if($type == 4 || $type == 13)
        {
        $jury = DB::table('juries')->where('idRequete','=',$id)->delete();

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
        }
        // dd($requete->all());


     

        // Mettre a jour la decesion
        $current_user = session('user')->id;
        $decision = DB::table('decisions')
                    ->where('idPresident','=',$current_user)
                    ->where('idRequete','=',$id)
                    ->get();
        foreach($decision as $dec)
                $idDecision = $dec->idDecision;

        if(count($decision)!=0)
        {
            DB::update('update decisions set avis = ?, observation = ? where idDecision = ?',
            [$request->decision,$request->observation,$idDecision]);
        return redirect()->back()->with('success','La d??cision a ??t?? bien modifi??e');

        }
        
        $currentDate = Carbon::now()->format('Y-m-d');
        
        $session_csd = DB::table('session_c_s_d_s')
                            ->where('etat_CSD','=','en cours')
                            ->where('dateSession','=',$currentDate)
                            ->get();
        foreach($session_csd as $session)
        {
            $idSess = $session->idSessionCSD;
            $idSessCSF = $session->idSessionCSF;
        }

    

        $decision = new Decision();
        $decision->idRequete = $id;
        $user = session('user');
        $decision->idPresident = $user->id;//session('user')->id;
        $decision->avis = $request->decision;
        $decision->idSessionCSF = $idSessCSF;
        $decision->idSessionCSD = $idSess;
        $decision->observation = $request->observation;
        $decision->save();
        return redirect()->back()->with('success','La d??cision a ??t?? bien enregistr??e');
    }

}
