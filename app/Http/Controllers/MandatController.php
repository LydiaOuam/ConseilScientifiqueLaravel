<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mandat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\MandatMember;

class MandatController extends Controller
{


    public function savedate(Request $req)
    {
            // $date = date($req->date_deb);
            // $date->addYears(3);
            // dd($date);
            // $available_date=Carbon::createFromFormat('d-m-y',$date)->addYears(3);
            $req->validate([
                'date_deb' => 'required|unique:mandats,dateDeb',
                'date_fin' => 'required|unique:mandats,dateFin|after:date_deb',
            ]);
            $mandat = new Mandat();
            $mandat->dateDeb=$req->date_deb;
            $mandat->dateFin=$req->date_fin;
            $mandat->etat = 1;
            $mandat->save();
            return redirect(route('AfficherMember'))->with('success','Mandat créé, ajoutez des membes');
        
  
    }
    public function showMember()
     { 
         if(isset($_GET['search']))  //cette partie est construite pour l'utilisation de search
             {
                 $search_text = $_GET['search'];
                 $comptes = DB::table('users as u')->select(['u.id','u.fname','u.name'])
                    ->whereRaw("u.id in(select user_id from role_user where role_id in
                    (select id from roles where name != 'etudiant-doctorant') and fname like '$search_text')")
                    ->paginate(5);

                 return view('Mandat.listMembre',['comptes'=>$comptes]);
             }
             else{
                

               $comptes = DB::table('users as u')->select(['u.id','u.fname','u.name'])
                    ->whereRaw("u.id in(select user_id from role_user where role_id in
                    (select id from roles where name != 'etudiant-doctorant'))")
                    ->paginate(5);
                 return view('Mandat.listMembre',['comptes'=>$comptes]);
             }
     
        }

        public function ajouterMembre($id)
        {
           $mandats =  Mandat::where('etat',1)->first(); //1 siginifie mandat en cours on peut utiliser get ou first=>retire le premier element et elle sort 
           $tuples_mand_meb = DB::table('mandat_membrers')
                                ->where('idMembre','=',$id)
                                ->where('idMandat','=',$mandats->idMandat)
                                ->get();
           dd($tuples_mand_meb);
           $mandat_mem = new MandatMember();
           $mandat_mem->idMandat = $mandats->idMandat;
           $mandat_mem->idMembre = $id;
           $mandat_mem->save();
           return redirect (route('AfficherMember'))->with('success','Membre ajouté');
        }
}
