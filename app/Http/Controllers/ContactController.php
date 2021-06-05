<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class ContactController extends Controller
{

    //c est pour afficher tous les messages
    public function afficherMessage($id)
    {

        $messages = Message::where('destinataire',session('user')->login)->get();
        $message = Message::find($id);
        return view('/contenu',compact('message','messages'));
    }




}
