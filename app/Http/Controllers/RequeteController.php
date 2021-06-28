<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Requete;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\SessionCSD;
use App\Models\Detail;
use App\Models\Publication;
use App\Models\Communication;



class RequeteController extends Controller
{
    public function shoReq()
    {
        $points = Point::where('id','<=',10)->get();
        return view('Requetes.choisirReq',compact('points'));
      
    }
    public function showReqEC()
    {
        $points = Point::where('id','<=',22)->get();
        return view('Requetes.espacEC',compact('points'));
      
    }

    public function showReqRF()
    {
        $points = Point::where('id','<=',24)->get();
        return view('Requetes.espaceRespForm',compact('points'));
      
    }


    public function showReqCP()
    {
        $points = Point::where('id','<=',23)->get();
        return view('Requetes.espaceChefProjet',compact('points'));
      
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

        // dd($request->all());
        $request->validate([
            'typedoc' => 'required',
            'direct'=>'required',
            'annee'=>'required',
            'intit'=>'required',
            'rapport'=>'required',
            'ListeAuteurs.*'=>'required',
            'TitrePublication.*'=>'required',
            'NomRevue.*'=>'required',
            'ImpactFactor.*'=>'required_without:sjr',
            'SJR.*'=>'required_without:impact',
            'DateSoumission.*'=>'required',
            'DateAcceptation.*'=>'required|after:datesOum',
            'DateApparution.*'=>'after:dateAcc',
            'URL_Revue.*'=>'required',
            'ListeAuteurCom.*'=>'required',
            'TitreCom.*'=>'required',
            'NomCom.*'=>'required',
            'DateDebCom.*'=>'required',
            'DateFinCom.*'=>'required|after:dateFinCom',
            'LieuCom.*'=>'required',

        ]);


        
        $dateSoum =  new DateTime( date('Y-m-d'));
        $requete = new Requete();
        $requete->dateSoumission =  $dateSoum;
        $requete->type = 4;
        $user=session('user');
        $requete->idUser = $user->id;
        
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();

        // dd($request->all());

        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();

        $detail->idRequete = $req_last->idRequete;
        $detail->typeDoctorat = $request->typedoc;
        $detail->nomPrenomDirecteur = $request->direct;
        $detail->annee = $request->annee;
        $detail->intituleDesign = $request->intit;

        $detail->save();

        $nombrePub = count($request->ListeAuteurs);

       
    
        for($i = 0; $i<$nombrePub;$i++)
        {
        $publications = new Publication();
          
            $publications->idRequete =  $req_last->idRequete;
            $publications->listeAuteurs =  $request->ListeAuteurs[$i]; 
            $publications->titrePub =  $request->TitrePublication[$i]; 
            $publications->nomRevue =  $request->NomRevue[$i]; 
            $publications->impact =  $request->ImpactFactor[$i]; 
            $publications->sjr =  $request->SJR[$i]; 
            $publications->datesOum =  $request->DateSoumission[$i]; 
            $publications->dateAcc =  $request->DateAcceptation[$i]; 
            $publications->dateParu =  $request->DateApparution[$i]; 
            $publications->urlrevue =  $request->URL_Revue[$i]; 
            $publications->urlpapier =  $request->URL_papier[$i]; 
            $publications->save();
        }


        $nombreCom = count($request->TitreCom);
            
    
        for($i = 0; $i<$nombreCom;$i++)
        {
        $communication = new Communication();
          
            $communication->idRequete =  $req_last->idRequete;
            $communication->listeAuteurs =  $request->ListeAuteurCom[$i]; 
            $communication->titreCom =  $request->TitreCom[$i]; 
            $communication->intitCom =  $request->NomCom[$i]; 
            $communication->dateDebCom =  $request->DateDebCom[$i]; 
            $communication->dateFinCom =  $request->DateFinCom[$i]; 
            $communication->lieuCom =  $request->LieuCom[$i]; 
            $communication->urlCom =  $request->URLCom[$i]; 
            $communication->save();
        }

        $data = DB::table('requetes')->select('idRequete')
                                    ->orderBy('idRequete','desc')
                                    ->first();
                                    
    
        if($request->hasFile('rapport')){
            $files = $request->rapport;
           
                $name =  $files->getClientOriginalName();
                if(  $files ->move('upload',$name))
                {
                    $item = new Item();
                    $item->idRequete = $data->idRequete;
                    $item->fichier = $name;
                    $item->save();
                }
               
               
        }

                                        
    
        if($request->hasFile('rapportC')){
            $files = $request->rapportC;
           
                $name =  $files->getClientOriginalName();
                if(  $files->move('upload',$name))
                {
                    $item = new Item();
                    $item->idRequete = $data->idRequete;
                    $item->fichier = $name;
                    $item->save();
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
        

       
        echo '<script>
            alert( "Votre requête  a été bien soumise")
             </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-2);'
            , '</script>';

         
    
    }
            /**  Abondonner une these*/
    public function saveAbondon(Request $request)
    {
        $request->validate([
            'Directeur'=>'required',
            'Intitulé' => 'required',

        ]);
        
        $dateSoum =  new DateTime( date('Y-m-d'));
        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 1; 
        $user=session('user');
        $requete->idUser = $user->id;
                
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();

        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();

        $detail->idRequete = $req_last->idRequete;
        $detail->nomPrenomDirecteur = $request->Directeur;
        $detail->intituleDesign = $request->Intitulé;

        $detail->save();

     
        echo '<script>
            alert( "Votre requête  a été bien soumise")
             </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-2);'
            , '</script>';


    }
    /** Sejour scientifique */
    public function saveSejour(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'Pays' => 'required',
            'Etablissement'=>'required',
            'Début'=>'required',
            'Fin'=>'required',
            'Responsable'=>'required',
        ]);

     

        $dateSoum =  new DateTime( date('Y-m-d'));

        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 2;
        $user=session('user');
        $requete->idUser = $user->id;
                
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();

        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();

        $detail->idRequete = $req_last->idRequete;
        $detail->paysDestination = $request->Pays;
        $detail->etablissementaAccueil = $request->Etablissement;
        $detail->dateDeb = $request->Début;
        $detail->dateFin = $request->Fin;
        $detail->nomPrenomDirecteur = $request->Responsable;

        $detail->save();

        
        echo '<script>
            alert( "Votre requête  a été bien soumise")
             </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-2);'
            , '</script>';

    }
        /**Changement du theme */
    public function saveChanger(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nom'=>'required',
            'IntituléInitial' => 'required',
        ]);


        $dateSoum =  new DateTime( date('Y-m-d'));
        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 3;
        $user=session('user');
        $requete->idUser = $user->id;
                        
        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();

        
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();

 

        $detail->idRequete = $req_last->idRequete;
        $detail->intituleDesign = $request->IntituléInitial;


        $detail->save();
        
        echo '<script>
            alert( "Votre requête  a été bien soumise")
             </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-2);'
            , '</script>';

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

    
        $dateSoum =  new DateTime( date('Y-m-d'));

        $requete = new Requete();
        $requete->dateSoumission = $dateSoum ;
        $requete->type = 5;
        $user=session('user');
        $requete->idUser = $user->id;

        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();

             
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();


        $detail->idRequete = $req_last->idRequete;
        $detail->nomPrenomDirecteur = $request->NomDirecteurActuel;
        $detail->nomPrenomResSecondaire = $request->NomDirecteur;
        $detail->observation = $request->Motif;

        $detail->save();

        echo '<script>
            alert( "Votre requête  a été bien soumise")
             </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-2);'
            , '</script>';
    }
    /**s'inscrire */
    
    public function saveInscription(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'type' => 'required',
            'NomDirecteur'=>'required',
            'NomCoDirecteur'=>'required',
            'Diplôme'=>'required',
            'Intitulé'=>'required',

        ]);



        $dateSoum =  new DateTime( date('Y-m-d'));

        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 7;
        $user=session('user');
        $requete->idUser = $user->id;

        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();

                     
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();


        $detail->idRequete = $req_last->idRequete;
        $detail->typeDoctorat = $request->type;
        $detail->nomPrenomDirecteur = $request->NomDirecteur;
        $detail->nomPrenomResSecondaire = $request->NomCoDirecteur;
        $detail->diplomeAcc = $request->Diplôme;
        $detail->intituleDesign = $request->Intitulé;


        $detail->save();


        echo '<script>
            alert( "Votre requête  a été bien soumise")
             </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-2);'
            , '</script>';
    }
    /**Geler inscription */
    public function saveGeler(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            
            'observation' => 'required',
        ]);

    

        $dateSoum =  new DateTime( date('Y-m-d'));

        $requete = new Requete();
        $requete->dateSoumission = $dateSoum;
        $requete->type = 8;
        $user=session('user');
        $requete->idUser = $user->id;

        $session = SessionCSD::all();
        $last_sessionCsd_object = collect($session)->last();
        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
        $attach = false;

        if($last_sessionCsd_object->dateLimite > $result)
        {     $attach = true; 
            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
        }
        $requete->save();

                          
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();


        $detail->idRequete = $req_last->idRequete;
        $detail->observation = $request->observation;

        $detail->save();

        echo '<script>
            alert( "Votre requête  a été bien soumise")
             </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-2);'
            , '</script>';
    }

       /**AJOUTER UN CO DIRECTER */
       public function saveCoDirec(Request $request)
       {
            // dd($request->all());
           $request->validate([
               
               'nomDirecteur'=>'required',
               'observation' => 'required',
           ]);

        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission = $dateSoum;
           $requete->type = 9;
           $user=session('user');
            $requete->idUser = $user->id;

           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
           $requete->save();

                                    
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();

        $detail->idRequete = $req_last->idRequete;
        $detail->nomPrenomResSecondaire	= $request->nomDirecteur;
        $detail->observation = $request->observation;

        $detail->save();

           echo '<script>
           alert( "Votre requête  a été bien soumise")
            </script>';
       echo '<script type="text/javascript">'
           , 'history.go(-2);'
           , '</script>';
       }

       /**Reinscription */

       public function saveReinscription(Request $request)
       {
            // dd($request->all());
           $request->validate([
               'type' => 'required',
               'NomDirecteur'=>'required',
               'NomCoDirecteur'=>'required',
               'Diplôme'=>'required',
               'Intitulé'=>'required',
   
           ]);

   
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission = $dateSoum;
           $requete->type = 10;
           $user=session('user');
           $requete->idUser = $user->id;

           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
           $requete->save();

                          
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();


        $detail->idRequete = $req_last->idRequete;
        $detail->typeDoctorat = $request->type;
        $detail->nomPrenomDirecteur = $request->NomDirecteur;
        $detail->nomPrenomResSecondaire = $request->NomCoDirecteur;
        $detail->diplomeAcc = $request->Diplôme;
        $detail->intituleDesign = $request->Intitulé;


        $detail->save();

           echo '<script>
           alert( "Votre requête  a été bien soumise")
            </script>';
       echo '<script type="text/javascript">'
           , 'history.go(-2);'
           , '</script>';
       }

       /** promotion academique*/

       public function savePromAcad(Request $request)
       {
            // dd($request->all());
           $request->validate([
               'GradeActuel' => 'required',
               'Grade' => 'required',
           ]);
 
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission =  $dateSoum;
           $requete->type = 11;
            $user=session('user');
            $requete->idUser = $user->id;

           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
           $requete->save();

                                     
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();

        $detail->idRequete = $req_last->idRequete;
        $detail->gradeActuel = $request->GradeActuel;
        $detail->promotion = $request->Grade;

        $detail->save();

           echo '<script>
           alert( "Votre requête  a été bien soumise")
            </script>';
       echo '<script type="text/javascript">'
           , 'history.go(-2);'
           , '</script>';
       }

       
       /** promotion recherche*/

       public function savePromRech(Request $request)
       {
            // dd($request->all());
           $request->validate([
               'GradeActuel' => 'required',
               'Grade' => 'required',
           ]);
   
   
   
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission =  $dateSoum;
           $requete->type = 12;
            $user=session('user');
            $requete->idUser = $user->id;
           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
           $requete->save();

                                                
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();

        $detail->idRequete = $req_last->idRequete;
        $detail->nomprenomCandidat = $request->Nom;
        $detail->gradeActuel = $request->GradeActuel;
        $detail->promotion = $request->Grade;

        $detail->save();

           echo '<script>
           alert( "Votre requête  a été bien soumise")
            </script>';
       echo '<script type="text/javascript">'
           , 'history.go(-2);'
           , '</script>';
       }

         
       /** Habilitation*/

       public function saveHabilitation(Request $request)
       {
            // dd($request->all());
           $request->validate([
               'cv'=>'required',
           ]);
   
  
        $dateSoum =  new DateTime( date('Y-m-d'));

           $requete = new Requete();
           $requete->dateSoumission =  $dateSoum;
           $requete->type = 13;
           $user=session('user');
           $requete->idUser = $user->id;

           $session = SessionCSD::all();
           $last_sessionCsd_object = collect($session)->last();
           $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
           $attach = false;
   
           if($last_sessionCsd_object->dateLimite > $result)
           {     $attach = true; 
               $requete->idSession = $last_sessionCsd_object->idSessionCSD;
           }
         
        
           $requete->save();

                                                          
        $detail = new Detail();
        $req = Requete::all();
        $req_last  = collect($req)->last();

        $detail->idRequete = $req_last->idRequete;
        $detail->observation = $request->observation;

        $detail->save();

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

            echo '<script>
            alert( "Votre requête  a été bien soumise")
             </script>';
        echo '<script type="text/javascript">'
            , 'history.go(-2);'
            , '</script>';
       }

         /**Polycopie */
        public function savePolycopie(Request $request)
        {
            // dd($request->all());
            $request->validate([
                'polycopié' => 'required',
            ]);
  
        $dateSoum =  new DateTime( date('Y-m-d'));

            $requete = new Requete();
            $requete->dateSoumission =  $dateSoum;
            $requete->type = 14;
            $user=session('user');
            $requete->idUser = $user->id;

            $session = SessionCSD::all();
            $last_sessionCsd_object = collect($session)->last();
            $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
            $attach = false;
    
            if($last_sessionCsd_object->dateLimite > $result)
            {     $attach = true; 
                $requete->idSession = $last_sessionCsd_object->idSessionCSD;
            }
          
            $requete->save();

            $detail = new Detail();
            $req = Requete::all();
            $req_last  = collect($req)->last();
    
            $detail->idRequete = $req_last->idRequete;
            $detail->observation = $request->observation;
    
            $detail->save();

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


                    echo '<script>
                    alert( "Votre requête  a été bien soumise")
                     </script>';
                echo '<script type="text/javascript">'
                    , 'history.go(-2);'
                    , '</script>';
        }

         /**Anne sabbatique */
         public function saveAnnee(Request $request)
         {
            //  dd($request->all());
             $request->validate([
                 'detisnation' => 'required',
                 'etablissement' => 'required',
                 'DateDébut' => 'required',
                 'DateFin' => 'required',

             ]);
 
 
        $dateSoum =  new DateTime( date('Y-m-d'));

             $requete = new Requete();
             $requete->dateSoumission = $dateSoum;
             $requete->type = 15;
  $user=session('user');
        $requete->idUser = $user->id;

             $session = SessionCSD::all();
             $last_sessionCsd_object = collect($session)->last();
             $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
             $attach = false;
     
             if($last_sessionCsd_object->dateLimite > $result)
             {     $attach = true; 
                 $requete->idSession = $last_sessionCsd_object->idSessionCSD;
             }
             $requete->save();

             
            $detail = new Detail();
            $req = Requete::all();
            $req_last  = collect($req)->last();

    
            $detail->idRequete = $req_last->idRequete;
            $detail->paysDestination = $request->detisnation;
            $detail->dateDeb = $request->DateDébut;
            $detail->dateFin = $request->DateFin;
            $detail->etablissementaAccueil = $request->etablissement;
            $detail->save();

             echo '<script>
             alert( "Votre requête  a été bien soumise")
              </script>';
         echo '<script type="text/javascript">'
             , 'history.go(-2);'
             , '</script>';
         }

            /**Rapport recherche */
            public function saveNvPrRech(Request $request)
            {
                //  dd($request->all());
                $request->validate([
                    'Intitulé' => 'required',
                    'Chef' => 'required',
                    'rapport' => 'required',
                ]);


        $dateSoum =  new DateTime( date('Y-m-d'));

                $requete = new Requete();
                $requete->dateSoumission = $dateSoum;
                $requete->type = 16;
  $user=session('user');
        $requete->idUser = $user->id;
                $session = SessionCSD::all();
                $last_sessionCsd_object = collect($session)->last();
                $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
                $attach = false;
        
                if($last_sessionCsd_object->dateLimite > $result)
                {     $attach = true; 
                    $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                }
             
                $requete->save();

                $detail = new Detail();
                $req = Requete::all();
                $req_last  = collect($req)->last();

                $detail->idRequete = $req_last->idRequete;
                $detail->intituleDesign = $request->Intitulé;
                $detail->save();
    

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

                echo '<script>
                alert( "Votre requête  a été bien soumise")
                 </script>';
            echo '<script type="text/javascript">'
                , 'history.go(-2);'
                , '</script>';
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
  
        
        $dateSoum =  new DateTime( date('Y-m-d'));

              $requete = new Requete();
              $requete->dateSoumission = $dateSoum;
              $requete->type = 17;
              $user=session('user');
              $requete->idUser = $user->id;

              $session = SessionCSD::all();
              $last_sessionCsd_object = collect($session)->last();
              $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
              $attach = false;
      
              if($last_sessionCsd_object->dateLimite > $result)
              {     $attach = true; 
                  $requete->idSession = $last_sessionCsd_object->idSessionCSD;
              }
           
  
              $requete->save();

              
              $detail = new Detail();
              $req = Requete::all();
              $req_last  = collect($req)->last();


              $detail->idRequete = $req_last->idRequete;
              $detail->diplomeAcc = $request->Niveau;
              $detail->intituleDesign = $request->désignation;
              $detail->save();
  

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

              echo '<script>
              alert( "Votre requête  a été bien soumise")
               </script>';
          echo '<script type="text/javascript">'
              , 'history.go(-2);'
              , '</script>';
          }

          /**Titularisation */
          public function saveTitu(Request $request)
          {
            //   dd($request->all());
              $request->validate([
                  'demande' => 'required',
              ]);
  
        

              $dateSoum =  new DateTime( date('Y-m-d'));
  
              $requete = new Requete();
              $requete->dateSoumission = $dateSoum;
              $requete->type = 18;
  $user=session('user');
        $requete->idUser = $user->id;
              $session = SessionCSD::all();
              $last_sessionCsd_object = collect($session)->last();
              $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
              $attach = false;
      
              if($last_sessionCsd_object->dateLimite > $result)
              {     $attach = true; 
                  $requete->idSession = $last_sessionCsd_object->idSessionCSD;
              }
           
              
              $requete->save();

                            
              $detail = new Detail();
              $req = Requete::all();
              $req_last  = collect($req)->last();

   

              $detail->idRequete = $req_last->idRequete;
              $detail->observation = $request->observation;
              $detail->save();
  

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
  
 
              echo '<script>
              alert( "Votre requête  a été bien soumise")
               </script>';
          echo '<script type="text/javascript">'
              , 'history.go(-2);'
              , '</script>';
          }

          
          
          /**Mutation */
          public function SaveMuta(Request $request)
          {
            //   dd($request->all());
              $request->validate([
                  'etablissement'=>'required',
                  'demande' => 'required',
              ]);
  
             
  
              $dateSoum =  new DateTime( date('Y-m-d'));

              $requete = new Requete();
              $requete->dateSoumission =  $dateSoum;
              $requete->type = 19;
              $user=session('user');
              $requete->idUser = $user->id;
              $session = SessionCSD::all();
              $last_sessionCsd_object = collect($session)->last();
              $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
              $attach = false;
      
              if($last_sessionCsd_object->dateLimite > $result)
              {     $attach = true; 
                  $requete->idSession = $last_sessionCsd_object->idSessionCSD;
              }
           
              $requete->save();

                            
              $detail = new Detail();
              $req = Requete::all();
              $req_last  = collect($req)->last();


              $detail->idRequete = $req_last->idRequete;
              $detail->etablissementaAccueil = $request->etablissement;
              $detail->save();

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
  
 

              echo '<script>
              alert( "Votre requête  a été bien soumise")
               </script>';
          echo '<script type="text/javascript">'
              , 'history.go(-2);'
              , '</script>';
          }
   /**Mutation */
   public function saveRappExper(Request $request)
   {
     //   dd($request->all());
       $request->validate([
           'rapport' => 'required',
       ]);


       $dateSoum =  new DateTime( date('Y-m-d'));

       $requete = new Requete();
       $requete->dateSoumission = $dateSoum;
       $requete->type = 20;
       $user=session('user');
       $requete->idUser = $user->id;
       $session = SessionCSD::all();
       $last_sessionCsd_object = collect($session)->last();
       $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
       $attach = false;

       if($last_sessionCsd_object->dateLimite > $result)
       {     $attach = true; 
           $requete->idSession = $last_sessionCsd_object->idSessionCSD;
       }
    
       $requete->save();
                                   
       $detail = new Detail();
       $req = Requete::all();
       $req_last  = collect($req)->last();


       $detail->idRequete = $req_last->idRequete;
       $detail->observation = $request->observation;
       $detail->save();

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

       echo '<script>
       alert( "Votre requête  a été bien soumise")
        </script>';
   echo '<script type="text/javascript">'
       , 'history.go(-2);'
       , '</script>';
   }

     /**Suspension de la RT */
     public function saveSuspRT(Request $request)
     {
       //   dd($request->all());
         $request->validate([
             'demande' => 'required',
         ]);
  
 
         $dateSoum =  new DateTime( date('Y-m-d'));
  
         $requete = new Requete();
         $requete->dateSoumission = $dateSoum;
         $requete->type = 21;
         $user=session('user');
         $requete->idUser = $user->id;
         $session = SessionCSD::all();
         $last_sessionCsd_object = collect($session)->last();
         $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
         $attach = false;
  
         if($last_sessionCsd_object->dateLimite > $result)
         {     $attach = true; 
             $requete->idSession = $last_sessionCsd_object->idSessionCSD;
         }
      
         $requete->save();

         $detail = new Detail();
         $req = Requete::all();
         $req_last  = collect($req)->last();
  
  
         $detail->idRequete = $req_last->idRequete;
         $detail->observation = $request->observation;
         $detail->save();
  
  
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

         echo '<script>
         alert( "Votre requête  a été bien soumise")
          </script>';
     echo '<script type="text/javascript">'
         , 'history.go(-2);'
         , '</script>';
     }
               /**Rapport recherche */
               public function saveRappRech(Request $request)
               {
                  //  dd($request->all());
                   $request->validate([
                       'rapport' => 'required',
                   ]);

                   $dateSoum =  new DateTime( date('Y-m-d'));
       
                   $requete = new Requete();
                   $requete->dateSoumission =  $dateSoum;
                   $requete->type = 22;
                   $user=session('user');
                   $requete->idUser = $user->id;
                   $session = SessionCSD::all();
                   $last_sessionCsd_object = collect($session)->last();
                   $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
                   $attach = false;
            
                   if($last_sessionCsd_object->dateLimite > $result)
                   {     $attach = true; 
                       $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                   }
                   $requete->save();

                            
                    $detail = new Detail();
                    $req = Requete::all();
                    $req_last  = collect($req)->last();
            
            
                    $detail->idRequete = $req_last->idRequete;
                    $detail->observation = $request->observation;
                    $detail->save();
     
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
       
      

                   echo '<script>
                   alert( "Votre requête  a été bien soumise")
                    </script>';
               echo '<script type="text/javascript">'
                   , 'history.go(-2);'
                   , '</script>';
               }
                /**Rapport recherche synthese */
                public function saveRappSyn(Request $request)
                {
                   //  dd($request->all());
                    $request->validate([
                        'rapport' => 'required',
                    ]);

                    $dateSoum =  new DateTime( date('Y-m-d'));
        
                    $requete = new Requete();
                    $requete->dateSoumission = $dateSoum ;
                    $requete->type = 23;
                    $user=session('user');
                    $requete->idUser = $user->id;
                    $session = SessionCSD::all();
                    $last_sessionCsd_object = collect($session)->last();
                    $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
                    $attach = false;
             
                    if($last_sessionCsd_object->dateLimite > $result)
                    {     $attach = true; 
                        $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                    }
                    $requete->save();

                    
                            
                    $detail = new Detail();
                    $req = Requete::all();
                    $req_last  = collect($req)->last();
            
            
                    $detail->idRequete = $req_last->idRequete;
                    $detail->observation = $request->observation;
                    $detail->save();
      
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

                    echo '<script>
                    alert( "Votre requête  a été bien soumise")
                     </script>';
                echo '<script type="text/javascript">'
                    , 'history.go(-2);'
                    , '</script>';
                }

                    /**Modifier cahier de charge d'une formation */
                    public function saveModif(Request $request)
                    {
                       //  dd($request->all());
                        $request->validate([
                            'cahier' => 'required',
                        ]);
            
                        $dateSoum =  new DateTime( date('Y-m-d'));
            
                        $requete = new Requete();
                        $requete->dateSoumission =  $dateSoum;
                        $requete->type = 24;
                        $user=session('user');
                        $requete->idUser = $user->id;
                        $session = SessionCSD::all();
                        $last_sessionCsd_object = collect($session)->last();
                        $result = $dateSoum->format('Y-m-d');  // Trasnformation en string 
                        $attach = false;
                 
                        if($last_sessionCsd_object->dateLimite > $result)
                        {     $attach = true; 
                            $requete->idSession = $last_sessionCsd_object->idSessionCSD;
                        }
                        $requete->save();

                        $detail = new Detail();
                        $req = Requete::all();
                        $req_last  = collect($req)->last();
                
                
                        $detail->idRequete = $req_last->idRequete;
                        $detail->observation = $request->observation;
                        $detail->save();
          
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

                        echo '<script>
                        alert( "Votre requête  a été bien soumise")
                         </script>';
                    echo '<script type="text/javascript">'
                        , 'history.go(-2);'
                        , '</script>';
                    }
                

               
}
