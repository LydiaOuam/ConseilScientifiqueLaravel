@extends('base')
    @section('titre')
    Ajouter un compte
    @endsection

    @section('contenu')
 <!------------------------------AJOUTER UN COMPTE--------------------------->
 @section('action')
        {{route('Ajouter')}}
    @endsection



 <!-- 
     Quand il y a des erreurs de validation la classe Controller va directement les rediriger vers ici 
     C'est pour cela qu'on peut utiliser la variable $errors
  -->

 <form method="POST" action="/ajouterCompte" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
    @csrf
    <fieldset style="padding:0 20px 20px 30px;
    margin-bottom:20px;
    border:1px solid lightgray;
    margin-top: 10px;">
        <legend>Informations d'authentification:</legend>
            <div class="mb-3">
            <label for="email" class="form-label" >Nom d'utilisateur:</label>
            <input type="email" class="form-control" id="email" name="login" aria-describedby="emailHelp"  value="{{old('login')}}"> 

            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Mot de passe:</label>
            <input type="text" class="form-control" id="password" name="password" value="{{old('password')}}" >
            </div>
           
    </fieldset>
    <fieldset  style="padding:0 20px 20px 30px;
    margin-bottom:20px;
    border:1px solid lightgray;
    margin-top: 10px;">
        <legend>Rôles</legend>
        <!-- afficher tous les roles de la base de donnees -->
        @foreach($roles as $role)
            <input type="checkbox" name="choix[]" value="{{$role->id}}">
            <label for="divers" id="role">{{$role->display_name}}</label>
            <br>
        @endforeach
    </fieldset>
    <button type="submit" class="btn btn-success " style="margin-left:30px;width:200px">Ajouter</button>

    
</form>

    @endsection
