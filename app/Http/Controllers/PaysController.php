<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pays;
use Illuminate\Support\Facades\DB;



class PaysController extends Controller
{
    public function pays()
    {
        $pays = Pays::all();
        return view('Requetes.sejourScient',compact('pays'));
    }

    public function paysAnn()
    {
        $pays = Pays::all();
        return view('Requetes.annesabb',compact('pays'));
    }

    /** Retourner les donnees recuperer lors de la soumission de la requete: s'inscrire en premiere annee */


    public function souten()
    {
        $requete = DB::table('requetes')
                     ->where('idUser',session('user')->id)
                     ->where('type','=','7')
                     ->select('idRequete')
                     ->get();
// dd($requete);
                     foreach($requete as $req)
                        $idRequete = $req->idRequete;


        $details = DB::table('details')
                ->where('id','=',"$idRequete")
                ->get();
                // dd($details);

                return view('Requetes.soutenance',compact('details'));

    }
}
