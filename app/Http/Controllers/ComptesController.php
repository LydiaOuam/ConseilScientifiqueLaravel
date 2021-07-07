<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Departement;
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
                'password' => 'required',
                'fonction'=>'required'
            ]);

            $compte = new User();
            $compte->login = $req->input('login'); 
            $compte->password = $req->input('password');
            $compte->membre=$req->membre;
            $compte->fonction=$req->fonction;
            $compte->idDept =$req->departement;

            
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
        $dep = Departement::all();
        $roles = Role::all();
        return  view('/ajouterCompte',compact('dep','roles'));//une vue on lui passe un tableau
    }

    public function showRoleUser()
    {

        $user_roles = DB::table('role_user')->where('user_id',session('user')->id)->pluck('role_id')->toArray();
        $roles = Role::all();
        return  view('/modale',compact('roles','user_roles'));//une vue on lui passe un tableau
    }


    public function choisirRole($id)
    {
            if($id == 1)
                return redirect(route('Accueil'));
            if($id == 2)
                return redirect(route('ReqChoix'));
            if($id == 3)
                return redirect(route('espaceEC'));
            if($id == 4)
                return redirect(route('espaceCP'));
            if($id == 5)
                return redirect(route('espaceRF'));
            if($id == 6)
                return redirect(route('CSF'));
            if($id == 7)
                return redirect(route('absence')); 
            if($id == 8)
                return redirect(route('CFD')); 
            if($id == 9)
                return redirect(route('espaceDirecteurThese')); 

    }


}
