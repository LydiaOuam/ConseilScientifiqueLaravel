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
            if($user->etat != 0 && $user->supprim != 0)
            {
                if($user->password == $request->password)
                {
                   
                   
                   
                    
                    if($user->hasRole('administrateur'))
                    {
                        $request->session()->put('user',$user);
                        return redirect(route('ShowRoleUser'));
                    }
                    elseif($user->hasRole('etudiant-doctorant'))
                    {
                        $request->session()->put('user',$user);
                        return redirect(route('ShowRoleUser'));
                    
                    }
                    elseif($user->hasRole('enseignant-chercheur'))
                    {
    
                        $request->session()->put('user',$user);
                        return redirect(route('ShowRoleUser'));
                    }
                    elseif($user->hasRole('chefProjetDeRecherche'))
                    {
                        $request->session()->put('user',$user);
                        return redirect(route('ShowRoleUser'));
                    }
                    elseif($user->hasRole('responsableDeFormation'))
                    {
    
                        $request->session()->put('user',$user);
                        return redirect(route('ShowRoleUser'));
                    }
                    elseif($user->hasRole('directeurDeThese'))
                    {
    
                        $request->session()->put('user',$user);
                        return redirect(route('ShowRoleUser'));
                    }
                }
                else return redirect(route('Login'))->with('error','Mot de passe incorrecte') ;
               
            }
        else return redirect(route('Login'))->with('error','Les informations saisies sont incorrectes') ;

            
        }
        else return redirect(route('Login'))->with('error','Login incorrecte') ;
        
        // dd($user->password);
        // else echo 'j';
        // dd($user['password']);
    }
}
