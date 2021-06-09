<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mandat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\MandatMembrer;

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

    public function ajouterMembre(Request $req)
    {
       
       $mandats =  Mandat::all();
       $last_mandats_object = collect($mandats)->last(); 

       $membre = DB::table('mandat_membrers')
                 ->select('idMandat','idMembre')
                 ->where('idMandat', '=', $last_mandats_object->idMandat)
                 ->where('idMembre', '=', $req->membre)
                 ->get();
                //  dd($req->all());

        if(count($membre) > 0)
        {
            return redirect (route('AfficherMember'))->with('error','Membre déja existant');
        }
        else{
            
       $mandat_mem = new MandatMembrer();
       $mandat_mem->idMandat = $last_mandats_object->idMandat;
       $mandat_mem->idMembre =$req->membre;
       $mandat_mem->save();
       return redirect (route('AfficherMember'))->with('success','Membre ajouté');
        }

     
    }


    public function showMember()
     { 
         if(isset($_GET['search']))  //cette partie est construite pour l'utilisation de search
             {
                 $search_text = $_GET['search'];

                 $comptes = DB::table('users as u')
                 ->select('u.id','u.fname','u.name')
                 ->where('fonction', '<>', 'Etudiant-doctorant')
                 ->where('fname', 'LIKE', "%.$search_text.%")
                 ->get();

                 return view('Mandat.listMembre',['comptes'=>$comptes]);
             }
             else{
                
                $comptes = DB::table('users as u')
                ->select('u.id','u.fname','u.name')
                ->where('fonction', '<>', 'Etudiant-doctorant')
                ->get();
                 return view('Mandat.listMembre',['comptes'=>$comptes]);
             }
     
        }

    public function infMandat()
    {
        $mandat =DB::table('mandats')
                    ->orderBy('created_at', 'desc')
                    ->skip(1)->take(1)->get();
                 

        return view('Mandat.classerMandat',compact('mandat'));
 
    }

    public function classerM()
    {
        $mandat =DB::table('mandats')
                    ->orderBy('created_at', 'desc')
                    ->skip(1)->take(1)->first();

         DB::update('update mandats set etat = 0 where idMandat = ?',
                    [$mandat->idMandat]);


    }

    public function showPresident()
    {
        $comptes = DB::table('users as u')
        ->select('u.id','u.fname','u.name')
        ->where('fonction', '<>', 'Etudiant-doctorant')
        ->get();
         return view('createMandat',['comptes'=>$comptes]);
    }


}
