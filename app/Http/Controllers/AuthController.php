<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function authentifier(Request $request)
    {
       $request->validate([
            'login'=>'required|email',
           'password'=>'required'
       ]);
        $user = User::where('login',$request->login)->first();
        if($user != null)
        {
            if($user->etat != 0)
            {
                if($user->password == $request->password)
                echo "Welcome!";
            }
            
        }
        // dd($user->password);
        // else echo 'j';
        // dd($user['password']);
    }
}
