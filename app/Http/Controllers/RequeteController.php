<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Requete;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\SessionCSD;


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
                return redirect(route('Geler'));
                break;
            case "9":
                return redirect(route('Rajouter'));
                break;
            case "10":
                return redirect(route('Reinscrire'));
                break;
            case "11":
                return redirect(route('promAcad'));
                break;
            case "12":
                return redirect(route('promRech'));
                break;
            case "13":
                return redirect(route('Habilitation'));
                break;
            case "14":
                return redirect(route('Polycopie'));
                break;
            case "15":
                return redirect(route('anneesabb'));
                break;
            case "16":
                return redirect(route('NvProjetRech'));
                break;
            case "17":
                return redirect(route('offreFormat'));
                break;
            case "18":
                return redirect(route('Gtitu')); 
                break;
            case "19":
                return redirect(route('Mutat')); 
                break;
            case "20":
                return redirect(route('rapportExpertise'));
                break;
            case "21":
                return redirect(route('SuspenRT'));
                break;
            case "22":
                return redirect(route('GrapportRech'));
                break;
            case "23":
                return redirect(route('rapportSynthe'));
                break;
            case "24":
                return redirect(route('modifierCahier'));
                break;

        

        }
        
    }
        /** Soumettre dossier soutenance */
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


        
        $dateSoum =  new DateTime( date('Y-m-d'));
        $requete = new Requete();
        $requete->dateSoumission =  $dateSoum;
        $requete->type = 4;
        $requete->observation = $info;
        
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
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
        if($attach)
                return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
                return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
         
    
    }
            /**  Abondonner une these*/
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
        $dateSoum =  new DateTime( date('Y-m-d'));
        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 1;
        $requete->observation = $info;
                
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();
        if($attach)
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
    }
    /** Sejour scientifique */
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

        $dateSoum =  new DateTime( date('Y-m-d'));

        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 2;
        $requete->observation = $info;

                
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();

        if($attach)
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
    }
        /**Changement du theme */
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

        $dateSoum =  new DateTime( date('Y-m-d'));
        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 3;
        $requete->observation = $info;

                        
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();
        if($attach)
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
    }
    /**Changement du directeur */
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

        $dateSoum =  new DateTime( date('Y-m-d'));

        $requete = new Requete();
        $requete->dateSoumission = $dateSoum ;
        $requete->type = 5;
        $requete->observation = $info;
                                
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();
        if($attach)
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
    }
    /**s'inscrire */
    
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

        $dateSoum =  new DateTime( date('Y-m-d'));

        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 7;
        $requete->observation = $info;
                                        
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();
        if($attach)
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
    }
    /**Geler inscription */
    public function saveGeler(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            
            'Nom'=>'required',
            'observation' => 'required',
        ]);

        $tab = array($request->Nom,$request->observation);
        $info =  implode(" ",$tab);

        $dateSoum =  new DateTime( date('Y-m-d'));

        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 8;
        $requete->observation = $info;

        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();
        if($attach)
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
    }

       /**AJOUTER UN CO DIRECTER */
       public function saveCoDirec(Request $request)
       {
            // dd($request->all());
           $request->validate([
               
               'nom'=>'required',
               'observation' => 'required',
           ]);
   
           $tab = array($request->nom,$request->observation);
           $info =  implode(" ",$tab);
   
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission = $dateSoum;
           $requete->type = 9;
           $requete->observation = $info;
           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
           $requete->save();
           if($attach)
           return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
           return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
       }

       /**Reinscription */

       public function saveReinscription(Request $request)
       {
            // dd($request->all());
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
   
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission = $dateSoum;
           $requete->type = 10;
           $requete->observation = $info;
           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
           $requete->save();
           if($attach)
           return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
           return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
       }

       /** promotion academique*/

       public function savePromAcad(Request $request)
       {
            // dd($request->all());
           $request->validate([
               'GradeActuel' => 'required',
               'Grade' => 'required',
           ]);
   
           $tab = array($request->GradeActuel,$request->Grade);
           $info =  implode(" ",$tab);
   
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission =  $dateSoum;
           $requete->type = 11;
           $requete->observation = $info;
           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
           $requete->save();
           if($attach)
           return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
           return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
       }

       
       /** promotion recherche*/

       public function savePromRech(Request $request)
       {
            // dd($request->all());
           $request->validate([
               'GradeActuel' => 'required',
               'Grade' => 'required',
           ]);
   
           $tab = array($request->GradeActuel,$request->Grade);
           $info =  implode(" ",$tab);
   
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission =  $dateSoum;
           $requete->type = 12;
           $requete->observation = $info;
           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
           $requete->save();
           if($attach)
           return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
           return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
       }

         
       /** Habilitation*/

       public function saveHabilitation(Request $request)
       {
            // dd($request->all());
           $request->validate([
               'nom' => 'required',
               'département' => 'required',
               'cv'=>'required',
           ]);
   
           $tab = array($request->nom,$request->département,$request->observation);
           $info =  implode(" ",$tab);
   
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission =  $dateSoum;
           $requete->type = 13;
           $requete->observation = $info;
           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
         
        
           $requete->save();

           $data = DB::table('requetes')->select('idRequete')
           ->orderBy('idRequete','desc')
           ->first();
           

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

            if($request->hasFile('animation')){
                $files = $request->animation;
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

            if($request->hasFile('responsabilités')){
                $files = $request->responsabilités;
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

            if($request->hasFile('revues')){
                $files = $request->revues;
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
            if($attach)
            return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
            return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
       }

         /**Polycopie */
        public function savePolycopie(Request $request)
        {
            // dd($request->all());
            $request->validate([
                'nom' => 'required',
                'polycopié' => 'required',
            ]);
           
            $tab = array($request->nom,$request->observation);
            $info =  implode(" ",$tab);

        $dateSoum =  new DateTime( date('Y-m-d'));

            $requete = new Requete();
            $requete->dateSoumission =  $dateSoum;
            $requete->type = 14;
            $requete->observation = $info;
            $session = SessionCSD::all();
            $last_sessionCsd_object = collect($session)->last();
            $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
            $attach = false;
    
            if($last_sessionCsd_object->dateLimite > $result)
            {     $attach = true; 
                $requete->idSession = $last_sessionCsd_object->idSessionCSD;
            }
          
            $requete->save();

            $data = DB::table('requetes')->select('idRequete')
                    ->orderBy('idRequete','desc')
                    ->first();

                    if($file = $request->polycopié)
                    {
                        $name = $file->getClientOriginalName();
                       if($file->move('upload',$name)){
                        $item = new Item();
                        $item->idRequete = $data->idRequete;
                        $item->fichier = $name;
                        $item->save();
                       }
                    }

                    if($attach)
                    return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
                    return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
        }

         /**Anne sabbatique */
         public function saveAnnee(Request $request)
         {
            //  dd($request->all());
             $request->validate([
                 'nom' => 'required',
                 'detisnation' => 'required',
                 'etablissement' => 'required',
                 'DateDébut' => 'required',
                 'DateFin' => 'required',

             ]);
 
             $tab = array($request->nom,$request->detisnation,$request->etablissement,$request->DateDébut,$request->DateFin);
             $info =  implode(" ",$tab);
 
        $dateSoum =  new DateTime( date('Y-m-d'));

             $requete = new Requete();
             $requete->dateSoumission = $dateSoum;
             $requete->type = 15;
             $requete->observation = $info;
             $session = SessionCSD::all();
             $last_sessionCsd_object = collect($session)->last();
             $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
             $attach = false;
     
             if($last_sessionCsd_object->dateLimite > $result)
             {     $attach = true; 
                 $requete->idSession = $last_sessionCsd_object->idSessionCSD;
             }
             $requete->save();
             if($attach)
             return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
             return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
         }

            /**Rapport recherche */
            public function saveNvPrRech(Request $request)
            {
                //  dd($request->all());
                $request->validate([
                    'Intitulé' => 'required',
                    'Chef' => 'required',
                    'membre' => 'required',
                    'rapport' => 'required',
                ]);

                $tab = array($request->Intitulé,$request->Chef,$request->membre,$request->observation);
                $info =  implode(" ",$tab);

        $dateSoum =  new DateTime( date('Y-m-d'));

                $requete = new Requete();
                $requete->dateSoumission = $dateSoum;
                $requete->type = 16;
                $requete->observation = $info;
                $session = SessionCSD::all();
                $last_sessionCsd_object = collect($session)->last();
                $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
                $attach = false;
        
                if($last_sessionCsd_object->dateLimite > $result)
                {     $attach = true; 
                    $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                }
             
                $requete->save();

                $data = DB::table('requetes')->select('idRequete')
                ->orderBy('idRequete','desc')
                ->first();

                if($file = $request->rapport)
                {
                    $name = $file->getClientOriginalName();
                    if($file->move('upload',$name)){
                    $item = new Item();
                    $item->idRequete = $data->idRequete;
                    $item->fichier = $name;
                    $item->save();
                    }
                }
                if($attach)
                return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
                return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
            }

          
          /**Offre de formation */
          public function saveRappForm(Request $request)
          {
            //   dd($request->all());
              $request->validate([
                  'désignation' => 'required',
                  'Niveau' => 'required',
                  'cahier' => 'required',
              ]);
  
              $tab = array($request->nom,$request->Niveau,$request->observation);
              $info =  implode(" ",$tab);
  
        $dateSoum =  new DateTime( date('Y-m-d'));

              $requete = new Requete();
              $requete->dateSoumission = $dateSoum;
              $requete->type = 17;
              $requete->observation = $info;
              $session = SessionCSD::all();
              $last_sessionCsd_object = collect($session)->last();
              $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
              $attach = false;
      
              if($last_sessionCsd_object->dateLimite > $result)
              {     $attach = true; 
                  $requete->idSession = $last_sessionCsd_object->idSessionCSD;
              }
           
  
              $requete->save();

              $data = DB::table('requetes')->select('idRequete')
              ->orderBy('idRequete','desc')
              ->first();

              if($file = $request->cahier)
              {
                  $name = $file->getClientOriginalName();
                 if($file->move('upload',$name)){
                  $item = new Item();
                  $item->idRequete = $data->idRequete;
                  $item->fichier = $name;
                  $item->save();
                 }
              }
  
              if($attach)
              return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
              return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
          }

          /**Titularisation */
          public function saveTitu(Request $request)
          {
            //   dd($request->all());
              $request->validate([
                  'nom' => 'required',
                  'demande' => 'required',
              ]);
  
              $tab = array($request->nom,$request->observation);
              $info =  implode(" ",$tab);

              $dateSoum =  new DateTime( date('Y-m-d'));
  
              $requete = new Requete();
              $requete->dateSoumission = $dateSoum;
              $requete->type = 18;
              $requete->observation = $info;
              $session = SessionCSD::all();
              $last_sessionCsd_object = collect($session)->last();
              $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
              $attach = false;
      
              if($last_sessionCsd_object->dateLimite > $result)
              {     $attach = true; 
                  $requete->idSession = $last_sessionCsd_object->idSessionCSD;
              }
           
              
              $requete->save();

              $data = DB::table('requetes')->select('idRequete')
              ->orderBy('idRequete','desc')
              ->first();

              if($file = $request->demande)
              {
                  $name = $file->getClientOriginalName();
                 if($file->move('upload',$name)){
                  $item = new Item();
                  $item->idRequete = $data->idRequete;
                  $item->fichier = $name;
                  $item->save();
                 }
              }
  
 
              if($attach)
              return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
              return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
          }

          
          
          /**Mutation */
          public function SaveMuta(Request $request)
          {
            //   dd($request->all());
              $request->validate([
                  'nom' => 'required',
                  'etablissement'=>'required',
                  'demande' => 'required',
              ]);
  
              $tab = array($request->nom,$request->etablissement,$request->observation);
              $info =  implode(" ",$tab);
  
              $dateSoum =  new DateTime( date('Y-m-d'));

              $requete = new Requete();
              $requete->dateSoumission =  $dateSoum;
              $requete->type = 19;
              $requete->observation = $info;
              $session = SessionCSD::all();
              $last_sessionCsd_object = collect($session)->last();
              $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
              $attach = false;
      
              if($last_sessionCsd_object->dateLimite > $result)
              {     $attach = true; 
                  $requete->idSession = $last_sessionCsd_object->idSessionCSD;
              }
           
              $requete->save();

              $data = DB::table('requetes')->select('idRequete')
              ->orderBy('idRequete','desc')
              ->first();

              if($file = $request->demande)
              {
                  $name = $file->getClientOriginalName();
                 if($file->move('upload',$name)){
                  $item = new Item();
                  $item->idRequete = $data->idRequete;
                  $item->fichier = $name;
                  $item->save();
                 }
              }
  
 
  
             
              if($attach)
              return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
              return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
          }
   /**Mutation */
   public function saveRappExper(Request $request)
   {
     //   dd($request->all());
       $request->validate([
           'nom' => 'required',
           'rapport' => 'required',
       ]);

       $tab = array($request->nom,$request->observation);
       $info =  implode(" ",$tab);
       $dateSoum =  new DateTime( date('Y-m-d'));

       $requete = new Requete();
       $requete->dateSoumission = $dateSoum;
       $requete->type = 20;
       $requete->observation = $info;
       $session = SessionCSD::all();
       $last_sessionCsd_object = collect($session)->last();
       $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
       $attach = false;

       if($last_sessionCsd_object->dateLimite > $result)
       {     $attach = true; 
           $requete->idSession = $last_sessionCsd_object->idSessionCSD;
       }
    
       $requete->save();

       $data = DB::table('requetes')->select('idRequete')
       ->orderBy('idRequete','desc')
       ->first();

       if($file = $request->rapport)
       {
           $name = $file->getClientOriginalName();
          if($file->move('upload',$name)){
           $item = new Item();
           $item->idRequete = $data->idRequete;
           $item->fichier = $name;
           $item->save();
          }
       }
                    
       if($attach)
       return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
       return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
   }

     /**Suspension de la RT */
     public function saveSuspRT(Request $request)
     {
       //   dd($request->all());
         $request->validate([
             'nom' => 'required',
             'demande' => 'required',
         ]);
  
         $tab = array($request->nom,$request->observation);
         $info =  implode(" ",$tab);
         $dateSoum =  new DateTime( date('Y-m-d'));
  
         $requete = new Requete();
         $requete->dateSoumission = $dateSoum;
         $requete->type = 21;
         $requete->observation = $info;
         $session = SessionCSD::all();
         $last_sessionCsd_object = collect($session)->last();
         $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
         $attach = false;
  
         if($last_sessionCsd_object->dateLimite > $result)
         {     $attach = true; 
             $requete->idSession = $last_sessionCsd_object->idSessionCSD;
         }
      
         $requete->save();
  
         $data = DB::table('requetes')->select('idRequete')
         ->orderBy('idRequete','desc')
         ->first();
  
         if($file = $request->demande)
         {
             $name = $file->getClientOriginalName();
            if($file->move('upload',$name)){
             $item = new Item();
             $item->idRequete = $data->idRequete;
             $item->fichier = $name;
             $item->save();
            }
         }
         if($attach)
         return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
         return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
     }
               /**Rapport recherche */
               public function saveRappRech(Request $request)
               {
                  //  dd($request->all());
                   $request->validate([
                       'nom' => 'required',
                       'rapport' => 'required',
                   ]);
       
                   $tab = array($request->nom,$request->observation);
                   $info =  implode(" ",$tab);
                   $dateSoum =  new DateTime( date('Y-m-d'));
       
                   $requete = new Requete();
                   $requete->dateSoumission =  $dateSoum;
                   $requete->type = 22;
                   $requete->observation = $info;
                   $requete->observation = $info;
                   $session = SessionCSD::all();
                   $last_sessionCsd_object = collect($session)->last();
                   $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
                   $attach = false;
            
                   if($last_sessionCsd_object->dateLimite > $result)
                   {     $attach = true; 
                       $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                   }
                   $requete->save();
     
                   $data = DB::table('requetes')->select('idRequete')
                   ->orderBy('idRequete','desc')
                   ->first();
     
                   if($file = $request->rapport)
                   {
                       $name = $file->getClientOriginalName();
                      if($file->move('upload',$name)){
                       $item = new Item();
                       $item->idRequete = $data->idRequete;
                       $item->fichier = $name;
                       $item->save();
                      }
                   }
       
      
                   if($attach)
                   return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
                   return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
               }
                /**Rapport recherche synthese */
                public function saveRappSyn(Request $request)
                {
                   //  dd($request->all());
                    $request->validate([
                        'nom' => 'required',
                        'rapport' => 'required',
                    ]);
        
                    $tab = array($request->nom,$request->observation);
                    $info =  implode(" ",$tab);
                    $dateSoum =  new DateTime( date('Y-m-d'));
        
                    $requete = new Requete();
                    $requete->dateSoumission = $dateSoum ;
                    $requete->type = 23;
                    $requete->observation = $info;
                    $requete->observation = $info;
                    $session = SessionCSD::all();
                    $last_sessionCsd_object = collect($session)->last();
                    $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
                    $attach = false;
             
                    if($last_sessionCsd_object->dateLimite > $result)
                    {     $attach = true; 
                        $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                    }
                    $requete->save();
      
                    $data = DB::table('requetes')->select('idRequete')
                    ->orderBy('idRequete','desc')
                    ->first();
      
                    if($file = $request->rapport)
                    {
                        $name = $file->getClientOriginalName();
                       if($file->move('upload',$name)){
                        $item = new Item();
                        $item->idRequete = $data->idRequete;
                        $item->fichier = $name;
                        $item->save();
                       }
                    }
                    if($attach)
                    return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
                    return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
                }

                    /**Modifier cahier de charge d'une formation */
                    public function saveModif(Request $request)
                    {
                       //  dd($request->all());
                        $request->validate([
                            'cahier' => 'required',
                        ]);
            
                        $tab = array($request->observation);
                        $info =  implode(" ",$tab);
                        $dateSoum =  new DateTime( date('Y-m-d'));
            
                        $requete = new Requete();
                        $requete->dateSoumission =  $dateSoum;
                        $requete->type = 24;
                        $requete->observation = $info;
                        $session = SessionCSD::all();
                        $last_sessionCsd_object = collect($session)->last();
                        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
                        $attach = false;
                 
                        if($last_sessionCsd_object->dateLimite > $result)
                        {     $attach = true; 
                            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                        }
                        $requete->save();
          
                        $data = DB::table('requetes')->select('idRequete')
                        ->orderBy('idRequete','desc')
                        ->first();
          
                        if($file = $request->cahier)
                        {
                            $name = $file->getClientOriginalName();
                           if($file->move('upload',$name)){
                            $item = new Item();
                            $item->idRequete = $data->idRequete;
                            $item->fichier = $name;
                            $item->save();
                           }
                        }
                        if($attach)
                        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise, elle sera traitée le : $last_sessionCsd_object->dateSession");
                        return redirect(route('ReqChoix'))->with('success',"Votre requête  a été bien soumise");
                    }
                

               
}
