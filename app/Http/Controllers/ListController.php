<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class ListController extends Controller
{
   public function show()
   {

        if(isset($_GET['search']))
        {
            $search_text = $_GET['search'];
            $comptes = DB::table('users')
            ->where('login','LIKE','%'.$search_text.'%')
            ->where('login','<>',session('user')->login)
            ->where('supprim','!=',0)
            ->paginate(5);
            return view('/listCompte',['comptes'=>$comptes]); 
            /**
             * Remarque: ici -> ['comptes'=>$comptes]); 
             * first parameter represente le nom de la variable qui sera envoye ers la page /listCompte
             * the second represent the variable
             */
        }
        else{
            $listCpt =  User::where('login','<>',session('user')->login)
                                ->where('supprim','!=',0)
                                ->paginate(5);
            return view('/listCompte',['comptes'=>$listCpt]);
        }

   }

//c'est pour afficher les informations d'un comptes
   public function edit(Request $request)
   {

       $compte = User :: find($request->id);
       $user_roles = DB::table('role_user')->where('user_id',$request->id)->pluck('role_id')->toArray();
       $roles = Role::all();
       return  view('/profile',compact('compte','user_roles','roles'));
   }



//c'est pour enregistrer les informations d'un compte
  

public function updatee(Request $request,$id)
   {
dd($request->all());
    
    $compte = User :: find($id);

       $compte->name=$request->name;
       $compte->fname=$request->fname;
       $compte->adress=$request->adress;
       $compte->dateBirth=$request->dateBirth;
       $compte->placeBirth=$request->placeBirth;
       $compte->TeNumber1=$request->TeNumber1;
       $compte->TeNumber2=$request->TeNumber2;
       $compte->login=$request->login;
       $compte->email2=$request->email2;
       $compte->TeachGrade=$request->TeachGrade;
       $compte->searchGrade=$request->searchGrade;
       $compte->fonction=$request->fonction;
       $compte->genre=$request->genre;

       if($file = $request->photo)
       {
           $name = $file->getClientOriginalName();
          if($file->move('images',$name)){
              $compte->photo = $name;
          }
       }


    DB::update('update users set name = ?, fname = ?,adress = ?, dateBirth = ?,
     placeBirth = ?, TeNumber1 = ?, TeNumber2 = ?, login = ? , email2 = ?, TeachGrade = ?,
      searchGrade = ?,fonction = ?, genre = ?, photo = ? where id = ?',
     [$request->name, $request->fname,$request->adress,$request->dateBirth,$request->placeBirth,
     $request->TeNumber1,$request->TeNumber2,$request->login,$request->email2,$request->TeachGrade,
     $request->searchGrade,$request->fonction,$request->genre,$compte->photo,$id]);

//        //FAUT ESSYER DE VERIFIER D'ABORD SI LE TABLEAU CHOIX N'EST PAS VIDE !!!!!!!!!!
//      //on supprime d'abbord les tuples existant pour mettre a jour les roles
    

    if(isset( $_POST['choix']))
        {
            $tab =  $_POST['choix'];
            DB::delete('delete from role_user where user_id = ?',[$id]);
                foreach($tab as $ta)
                {
                    $compte->attachRole($ta);
                }
                return redirect(route('Profile',$id))->with('success','Modifications enregistrées');
        }
        else{
            return redirect(route('Profile',$id))->with('error','Vous devez choisir au moins un rôle ');
        }
   }

    public function supprimer($id)
    {
        $compte = User :: find($id);
        DB::update('update users set supprim = 0 where id = ?',[$id]);
       return redirect(route('Comptes'))->with('success','Compte supprimé');
    }

    public function bloquer($id)
    {
        $compte = User :: find($id);
        DB::update('update users set etat = 0 where id = ?',[$id]);
        return redirect (route('Comptes'))->with('success','Compte bloqué');
    }

    public function debloquer($id)
    {
        $compte = User :: find($id);
        DB::update('update users set etat = 1 where id = ?',[$id]);
        return redirect (route('Comptes'))->with('success','Compte débloqué');
    }



}
