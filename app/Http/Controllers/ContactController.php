<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class ContactController extends Controller
{
    public function showMessages()
    {

        $message = Message::where('destinataire',session('user')->login)->get();
        return view('/contenu',['messages'=>$message]);
    }

}
