<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Message;


class MessagerieController extends Controller
{



    public function message(Request $request)
    {
// dd($request->all());
        $request->validate([
            'email'=>'required',
            'titre'=>'required',
            'contenu'=>'required'
       ]);
      $message = new Message();
      $message->expéditeur = session('user')->login;
      $message->destinataire = $request->input('email');
      $message->titre = $request->input('titre');
      $message->contenu = $request->input('contenu');

      $message->save();

      return redirect('/contact')->with('success','Message envoyé');
 
    }

    

    public function showMessages()
    {
        $users = User::all();



        $messages = Message::where('destinataire',session('user')->login)->orderBy('id', 'desc')->get();
        return view('/contact',compact('messages','users'));
    }






}