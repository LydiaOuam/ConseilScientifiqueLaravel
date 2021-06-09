<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mandat;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\MandatMembrer;

class MandatController extends Controller
{


    public function savedate(Request $req)
    {
        //    dd($req->all());
            $req->validate([
                'date_deb' => 'required|unique:mandats,dateDeb',
                'date_fin' => 'required|unique:mandats,dateFin|after:date_deb',
            ]);
            $mandat = new Mandat();
            $mandat->dateDeb=$req->date_deb;
            $mandat->dateFin=$req->date_fin;
            $mandat->etat = 1;
            $mandat->presidentCSF=$req->membre;

            $mandat->save();
            return redirect(route('showDept'))->with('success','Mandat créé, ajoutez des membes');
    }

    public function ajouter(Request $req)
    {
        // dd($req->all());
       $mandats =  Mandat::all();
       $last_mandats_object = collect($mandats)->last(); 

       $compte = DB::table('users')
                    ->where('id','=',$req->mem)->first();
                    // dd($compte->idDept);

       $membre = DB::table('mandat_membrers')
                 ->select('idMandat','idMembre')
                 ->where('idMandat', '=', $last_mandats_object->idMandat)
                 ->where('idMembre', '=', $req->mem)
                 ->get();
                //  dd($req->all());

        if(count($membre) > 0)
        {
            return redirect (route('AfficherMember',[$compte->idDept]))->with('error','Membre déja existant');
        }
        else{
            
       $mandat_mem = new MandatMembrer();
       $mandat_mem->idMandat = $last_mandats_object->idMandat;
       $mandat_mem->idMembre =$req->mem;
       $mandat_mem->save();
       return redirect (route('AfficherMember',[$compte->idDept]))->with('success','Membre ajouté');
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
        // dd($comptes);
         return view('createMandat',['comptes'=>$comptes]);
    }

    public function showDept()
    {
        $dep = Departement::all();
        return view('Mandat.departement',compact('dep'));
    }

    public function showdepar($idDept)
    {
        // dd($idDept);
        $dep = Departement::all();
        $comptes = DB::table('users as u')
        ->select('u.id','u.fname','u.name')
        ->where('fonction', '<>', 'Etudiant-doctorant')
        ->where('idDept', '=',$idDept)
        ->get();
        // dd($dep);
        // dd($comptes->all());
        
        
        return view('Mandat.membreperDep',compact('dep','comptes'));
    }

}
