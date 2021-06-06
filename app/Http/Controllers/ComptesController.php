<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\UtilisateurRole;

class ComptesController extends Controller
{
    public function myForm(Request $req)

    /*
    * Si notre utilisateur veut soumettre son formulaire
    * On doit d'abord le verifier et le valider
    *Avec la methode de Laravel validate()
    */
    {
    

        if($req->isMethod("post"))  
        {

            
            $this->validate($req,[
                'login' => 'required|unique:users',
                'password' => 'required'
            ]);

            $compte = new User();
            $compte->login = $req->input('login'); 
            $compte->password = $req->input('password');
            
            //recuperer les id des roles et du nouvel user en utilisant la superglobale POST

           

            if(isset( $_POST['choix']))
            {
                $compte->save();
                $tab =  $_POST['choix'];
                
                
                    foreach($tab as $ta)
                    {
                        $compte->attachRole($ta);
                    }
                    
                    return redirect('/ajouterCompte')->with('success','Compte créé');
            }
            else{
                return redirect('/ajouterCompte')->with('error','Vous devez choisir au moins un rôle ');
            }
        }
    }
    public function showRole()
    {

        $role = Role::all();
        return  view('/ajouterCompte',['roles'=>$role]);//une vue on lui passe un tableau
    }

    public function showRoleUser()
    {

        $user_roles = DB::table('role_user')->where('user_id',session('user')->id)->pluck('role_id')->toArray();
        $roles = Role::all();
        return  view('/modale',compact('roles','user_roles'));//une vue on lui passe un tableau
    }

}
