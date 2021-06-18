<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requete;
use App\Models\Point;
use App\Models\Item;
use App\Models\Decision;



class TraitementController extends Controller
{
    public function traiter()
    {

    
        $requetes = Requete::paginate(1);
        $items = Item::all();
        $types = Point::all();
        return view('/DSession.session',compact('requetes','types','items'));
    }

    public function traiter2()
    {

    
        $requetes = Requete::paginate(1);
        $items = Item::all();
        $types = Point::all();
        return view('/DSession.sessionCSD',compact('requetes','types','items'));
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
        $decision->idPresident = 2;//session('user')->id;
        $decision->avis = $request->decision;
        $decision->observation = $request->observation;
        $decision->save();
        // dd($id);
        // dd($request->all());
    }

}
