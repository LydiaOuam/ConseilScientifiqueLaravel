<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Requete;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Models\Item;


class RequeteController extends Controller
{
    public function shoReq()
    {
        $points = Point::where('id','<=',10)->get();
        return view('Requetes.choisirReq',compact('points'));
      
    }
    public function showReqEC()
    {
        $points = Point::where('id','<=',24)->get();
        return view('Requetes.espacEC',compact('points'));
      
    }


    public function choixReq(Request $req)
    {
        // if($req->typereq == 4){
        //     return redirect(route('Soutenance'));
        // };
        switch($req->typereq){
            case "1":
                
                return redirect(route('Abondon'));
                break;
            case "2":
                return redirect(route('SejSc'));
                break;
            case "3":
                return redirect(route('changerTh'));
                break;
            case "4":
                 return redirect(route('Soutenance'));
                break;
            case "5":
                return redirect(route('changerDire'));
                break;
            case "7":
                return redirect(route('insc'));
                break;
            case "8":
                return view('Requetes.geler');
                break;
            case "9":
                return view('Requetes.rajouter');
                break;
            case "10":
                return view('Requetes.reinscription');
                break;
            case "11":
                //return view('Requetes.rajouter');
                break;
            case "12":
               // return view('Requetes.rajouter');
                break;
            case "13":
                return view('Requetes.habilitation');
                break;
            case "14":
                return view('Requetes.polycopie');
                break;
            case "15":
                return view('Requetes.annesabb');
                break;
            case "16":
               //return view('Requetes.polycopie');
                break;
            case "17":
                return view('Requetes.offreFormat');
                break;
            case "18":
               // return view('Requetes.offreFormat');
                break;
            case "19":
                //return view('Requetes.offreFormat');
                break;
            case "20":
                return view('Requetes.rapportExpertise');
                break;
            case "21":
               //return view('Requetes.offreFormat');
                break;
            case "22":
                return view('Requetes.rapportRech');
                break;
            case "23":
                return view('Requetes.rapportSynthe');
                break;
            case "24":
                return view('Requetes.mofiCahieCh');
                break;

        

        }
        
    }
        
    public function saveRequete(Request $request)
    {
        $request->validate([
            'typedoc' => 'required',
            'nomPren' => 'required',
            'direct'=>'required',
            'annee'=>'required',
            'dep'=>'required',
            'intit'=>'required',
            'rapport'=>'required',
        ]);

        $tab = array($request->typedoc,$request->nomPren,$request->direct,$request->annee,$request->dep,$request->intit);
        $info =  implode(" ",$tab);

        $requete = new Requete();
        $requete->dateSoumission = new DateTime( date('Y-m-d H:i:s'));
        $requete->type = 4;
        $requete->observation = $info;
        $requete->save();
        
     

        $data = DB::table('requetes')->select('idRequete')
                                    ->orderBy('idRequete','desc')
                                    ->first();
                                    
    
        if($request->hasFile('rapport')){
            $files = $request->rapport;
            foreach($files as $rapp)
            {
                $name = $rapp->getClientOriginalName();
                if( $rapp->move('upload',$name))
                {
                    $item = new Item();
                    $item->idRequete = $data->idRequete;
                    $item->fichier = $name;
                    $item->save();
                }
               
               
            }
        }

        
        if($request->hasFile('brevet')){
            $files = $request->brevet;
            foreach($files as $rapp)
            {
                $name = $rapp->getClientOriginalName();
                if( $rapp->move('upload',$name))
                {
                    $item = new Item();
                    $item->idRequete = $data->idRequete;
                    $item->fichier = $name;
                    $item->save();
                }
               
               
            }
        }
        
        if($request->hasFile('communication')){
            $files = $request->communication;
            foreach($files as $rapp)
            {
                $name = $rapp->getClientOriginalName();
                if( $rapp->move('upload',$name))
                {
                    $item = new Item();
                    $item->idRequete = $data->idRequete;
                    $item->fichier = $name;
                    $item->save();
                }
               
               
            }
        }
        
        if($request->hasFile('publication')){
            $files = $request->publication;
            foreach($files as $rapp)
            {
                $name = $rapp->getClientOriginalName();
                if( $rapp->move('upload',$name))
                {
                    $item = new Item();
                    $item->idRequete = $data->idRequete;
                    $item->fichier = $name;
                    $item->save();
                }
               
               
            }
        }
  
    return redirect(route('ReqChoix'))->with('success','Votre requete  a été bien soumise, elle sera traitée le :');

    
    }

    public function saveAbondon(Request $request)
    {
        $request->validate([
            'Nom' => 'required',
            'Intitulé' => 'required',
            'Département'=>'required',
            'Directeur'=>'required',
        ]);
        $tab = array($request->Nom,$request->Intitulé,$request->Département,$request->Directeur,$request->Observation);
        $info =  implode(" ",$tab);

        $requete = new Requete();
        $requete->dateSoumission = new DateTime( date('Y-m-d H:i:s'));
        $requete->type = 1;
        $requete->observation = $info;
        $requete->save();
        return redirect(route('ReqChoix'))->with('success','Votre requete  a été bien soumise, elle sera traitée le :');
    }

    public function saveSejour(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'Nom' => 'required',
            'Pays' => 'required',
            'Etablissement'=>'required',
            'Début'=>'required',
            'Fin'=>'required',
            'Responsable'=>'required',
        ]);

        $tab = array($request->Nom,$request->Pays,$request->Etablissement,$request->Début,$request->Fin,$request->Responsable);
        $info =  implode(" ",$tab);

        $requete = new Requete();
        $requete->dateSoumission = new DateTime( date('Y-m-d H:i:s'));
        $requete->type = 1;
        $requete->observation = $info;
        $requete->save();
        return redirect(route('ReqChoix'))->with('success','Votre requete  a été bien soumise, elle sera traitée le :');
    }

    public function saveChanger(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'IntituléInitial' => 'required',
            'NouveauIntitulé' => 'required',
            'Motif'=>'required',
        ]);

        $tab = array($request->IntituléInitial,$request->NouveauIntitulé,$request->Motif);
        $info =  implode(" ",$tab);

        $requete = new Requete();
        $requete->dateSoumission = new DateTime( date('Y-m-d H:i:s'));
        $requete->type = 1;
        $requete->observation = $info;
        $requete->save();
        return redirect(route('ReqChoix'))->with('success','Votre requete  a été bien soumise, elle sera traitée le :');
    }

    public function saveChangerDir(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'NomDirecteurActuel' => 'required',
            'NomDirecteur' => 'required',
            'Motif'=>'required',
        ]);

        $tab = array($request->NomDirecteurActuel,$request->NomDirecteur,$request->Motif);
        $info =  implode(" ",$tab);

        $requete = new Requete();
        $requete->dateSoumission = new DateTime( date('Y-m-d H:i:s'));
        $requete->type = 1;
        $requete->observation = $info;
        $requete->save();
        return redirect(route('ReqChoix'))->with('success','Votre requete  a été bien soumise, elle sera traitée le :');
    }

    
    public function saveInscription(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'type' => 'required',
            'Département' => 'required',
            'Nom'=>'required',
            'NomDirecteur'=>'required',
            'NomCoDirecteur'=>'required',
            'Diplôme'=>'required',
            'Intitulé'=>'required',

        ]);

        $tab = array($request->type,$request->Département,$request->Nom,$request->NomDirecteur,$request->NomCoDirecteur,$request->Diplôme,$request->Intitulé);
        $info =  implode(" ",$tab);

        $requete = new Requete();
        $requete->dateSoumission = new DateTime( date('Y-m-d H:i:s'));
        $requete->type = 1;
        $requete->observation = $info;
        $requete->save();
        return redirect(route('ReqChoix'))->with('success','Votre requete  a été bien soumise, elle sera traitée le :');
    }



}
