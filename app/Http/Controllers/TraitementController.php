<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requete;
use App\Models\Point;
use App\Models\Item;



class TraitementController extends Controller
{
    public function traiter()
    {

    
        $requetes = Requete::paginate(1);
        $items = Item::all();
        $types = Point::all();
        return view('/DSession.session',compact('requetes','types','items'));
    }

    public function list( $id)
    {
        $items = Item::where('idItem',$id)->get();

        // dd($items);
        return view('list',compact('items'));
    }
}
