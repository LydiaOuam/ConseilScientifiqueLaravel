<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;


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
                {
                    if($user->hasRole('administarteur'))
                    {
                      
                        $request->session()->put('user',$user);
                        return redirect(route('Accueil'));
                    }
                    elseif($user->hasRole('etudiant-doctorant'))
                    {
    
                        echo 'Session etudiant';
                    }
                    elseif($user->hasRole('enseignant-chercheur'))
                    {
    
                        echo 'Session enseignant-chercheur';
                    }
                    elseif($user->hasRole('chefProjetDeRecherche'))
                    {
    
                        echo 'Session etudiant';
                    }
                    elseif($user->hasRole('responsableDeFormation'))
                    {
    
                        echo 'Session etudiant';
                    }
                    elseif($user->hasRole('directeurDeThese'))
                    {
    
                        echo 'Session directeurDeThese';
                    }
                }
                else echo 'Password incorrecte';
               
            }
            
        }
        // dd($user->password);
        // else echo 'j';
        // dd($user['password']);
    }
}
