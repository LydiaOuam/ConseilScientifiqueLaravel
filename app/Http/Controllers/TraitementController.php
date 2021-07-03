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



class TraitementController extends Controller
{
    public function traiter()
    {
     
    
        $requetes = DB::table('requetes')
                         ->where('etat','=','en attente')
                         ->paginate(1);
        $details = Detail::all();
        $items = Item::all();
        $types = Point::all();
        return view('/DSession.session',compact('requetes','types','items','details'));
    }

    public function traiter2()
    {

    
        // $requetes = Requete::paginate(1);

        $requetes = DB::table('requetes')
                    ->join('users','requetes.idUser','=','users.id')
                    ->join('departements','users.idDept','=','departements.idDept')
                    ->join('juries','requetes.idRequete','=','juries.idRequete')
                    ->paginate(1);
        $details = Detail::all();
        $items = Item::all();
        $types = Point::all();
        return view('/DSession.sessionCSD',compact('requetes','types','items','details'));
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

        $details = Detail::all();
        $juries = Jury::all();
        $users = User::all();
        $items = Item::all();
        $types = Point::all();
        return view('/DSession.sessionCFD',compact('requetes','types','items','details','juries'));
    }


    public function list( $id)
    {
        $items = Item::where('idItem',$id)->get();

        // dd($items);
        return view('list',compact('items'));
    }
    
    public function decision(Request $request,$id)
    {
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
