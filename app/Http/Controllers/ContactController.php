<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;



class ContactController extends Controller
{

    //c est pour afficher tous les messages
    public function afficherMessage($id)
    {

        $messages = Message::where('destinataire',session('user')->login)->get();
        $content = Message::find($id);
        DB::update('update messages set vu = 1 where id = ?',[$id]);
        // dd($content);
        return view('/contenu',compact('content','messages'));
    }

    public function repondre($id)
    {
        $content = Message::find($id);
        return view('reply',compact('content'));
    }



}
