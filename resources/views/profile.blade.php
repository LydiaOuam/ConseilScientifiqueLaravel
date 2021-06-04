@extends('base')
    @section('titre','Mon profile')
    @section('contenu')
        <!--  -----------------------------User Profile-------------------------------------- -->
        @section('action')
        {{route('Profile',[$compte->id])}}
        @endsection

        <!-- 
            * Les champs: nom,prenom,userName,password,email,date de naissance,adresse
         -->
<form  method="POST" action="{{route('UpdateCompte',[$compte->id])}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf
<img src="{{asset('/images/'.$compte->photo)}}" style="padding: 5px;
  height:200px;
  width: 200px;" class="img-fluid rounded float-end" alt="{{$compte->photo}}">
    <fieldset style="padding:0 20px 20px 30px;
    margin-bottom:20px;
    border:1px solid lightgray;
    margin-top: 10px;">



        <legend>Information personelles</legend>
            <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Nom" aria-label="Nom" name="name" value="{{$compte->name}}">
            <input type="text" class="form-control" placeholder="Prénom" aria-label="Prénom" name="fname" value="{{$compte->fname}}">
            </div>

            <label for="genre">Genre</label>
                <select name="genre" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option {{($compte->genre)=="HOMME" ? 'selected':''}} value="HOMME">Homme</option>
                    <option {{($compte->genre)=="FEMME" ? 'selected':''}} value="FEMME">Femme</option>
                </select>
            <label for="fonction">La fonction:</label>
                <select name="fonction" class="form-select form-select-sm" value="{{$compte->fonction}}">
                    <option {{($compte->fonction)=="Etudiant-doctorant" ? 'selected':''}} value="Etudiant-doctorant">Etudiant-doctorant</option>
                    <option {{($compte->fonction)=="Enseignant-chercheur" ? 'selected':''}} value="Enseignant-chercheur">Enseignant-chercheur</option>
                    <option {{($compte->fonction)=="Enseignant" ? 'selected':''}} value="Enseignant">Enseignant</option>
                    <option {{($compte->fonction)=="Chercheur" ? 'selected':''}} value="Chercheur">Chercheur</option>
                </select>

            <div class="mb-3">
            <label for="Adress" class="form-label">Adresse </label>
            <input type="text" class="form-control" id="Adress" name="adress" value="{{$compte->adress}}">

            <div class="mb-3">
            <label for="dateBirth" class="form-label">Date de naissance <em>*</em></label>
            <input type="date" class="form-control" id="dateBirth" name="dateBirth" min="1920-01-01" max="2008-01-01" value="{{$compte->dateBirth}}" >
            </div>
            <div class="mb-3">
                <label for="placeBirth" class="form-label">Lieu de naissance <em>*</em></label>
                 <input list="wilayas" name="placeBirth" id="placeBirth"  class="form-control"  value="{{$compte->placeBirth}}">
                <datalist id="wilayas">
                    <option value="Adrar">Adrar</option>
                    <option value="Chlef">Chlef</option>
                    <option value="Laghouat">Laghouat</option>
                    <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                    <option value="Batna">Batna</option>
                    <option value="Béjaïa">Béjaïa</option>
                    <option value="Biskra">Biskra</option>
                    <option value="Béchar">Béchar</option>
                    <option value="Blida">Blida</option>
                    <option value="Bouira">Bouira</option>
                    <option value="Tamanrasset">Tamanrasset</option>
                    <option value="Tébessa">Tébessa</option>
                    <option value="Tlemcen">Tlemcen</option>
                    <option value="Tiaret">Tiaret</option>
                    <option value="Tizi-Ouzou">Tizi-Ouzou</option>
                    <option value="Djelfa">Djelfa</option>
                    <option value="Jijel">Jijel</option>
                    <option value="Sétif">Sétif</option>
                    <option value="Saïda">Saïda</option>
                    <option value="Skikda">Skikda</option>
                    <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                    <option value="Annaba">Annaba</option>
                    <option value="Guelma">Guelma</option>
                    <option value="Constantine">Constantine</option>
                    <option value="Médéa">Médéa</option>
                    <option value="Mostaganem">Mostaganem</option>
                </datalist>
                </select>
            </div>


            <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Numéro de téléphone 1 *" name="TeNumber1"  aria-label="Numéro de téléphone 1 " value="{{$compte->TeNumber1}}">
            <input type="text" class="form-control" placeholder="Numéro de téléphone 2" name="TeNumber2" aria-label="Numéro de téléphone 2" value="{{$compte->TeNumber2}}">
            </div>

            <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            <input type="email" class="form-control" placeholder="Email 1*" name="login"  aria-label="Email 1" value="{{$compte->login}}">
            <input type="email" class="form-control" placeholder="Email 2" name="email2"  aria-label="Email 2" value="{{$compte->email2}}">
            </div>

            <div  class="mb-3">
                    <label for="photo" class="form-label">Ajouter une photo</label>
                    <input class="form-control" type="file" id="photo" name="photo">
            </div> 
            <label for="TeachGrade">Grade d'enseignement:</label>
                <select  name="TeachGrade" class="form-control"  value="{{$compte->TeachGrade}}">
                    <option {{($compte->TeachGrade)=="Maître assistant A" ? 'selected':''}} value="Maître assistant A" >Maître assistant A</option>
                    <option {{($compte->TeachGrade)=="Maître assistant B" ? 'selected':''}} value="Maître assistant B">Maître assistant B</option>
                    <option {{($compte->TeachGrade)=="Maître de conférence A" ? 'selected':''}} value="Maître de conférence A">Maître de conférence A</option>
                    <option {{($compte->TeachGrade)=="Maître de conférence B" ? 'selected':''}} value="Maître de conférence B">Maître de conférence B</option>
                    <option {{($compte->TeachGrade)=="Professeur" ? 'selected':''}} value="Professeur" >Professeur</option>
                </select>
                <br>
                <label for="searchGrade">Grade de recherche:</label>
                <select  name="searchGrade" class="form-control" value="{{$compte->searchGrade}}">
                    <option {{($compte->searchGrade)=="Attaché de recherche" ? 'selected':''}}  value="Attaché de recherche">Attaché de recherche</option>
                    <option {{($compte->searchGrade)=="Chargé de recherche" ? 'selected':''}} value="Chargé de recherche">Chargé de recherche</option>
                    <option {{($compte->searchGrade)=="Maître de recherche A" ? 'selected':''}} value="Maître de recherche A">Maître de recherche A</option>
                    <option {{($compte->searchGrade)=="Maître de recherche B" ? 'selected':''}} value="Maître de recherche B">Maître de recherche B</option>
                    <option {{($compte->searchGrade)=="Directeur de recherche" ? 'selected':''}} value="Directeur de recherche">Directeur de recherche</option>
                </select>             
    </fieldset>

    <fieldset style="padding:0 20px 20px 30px;
    margin-bottom:20px;
    border:1px solid lightgray;
    margin-top: 10px;">
            <legend>Informations d'authentification</legend>

            <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="email" class="form-control" placeholder="Nom d'utilisateur *" name="userName" value="{{$compte->login}}"  >
            <input type="text" class="form-control" placeholder="Mot de passe *"  name="password" value="{{$compte->password}}" >
            </div>
            <legend>Rôles</legend>
        

                    @foreach($roles as $role)                
                        @if(in_array($role->id,$user_roles))
                            <input type="checkbox" name="choix[]" value="{{$role->id}}" checked>
                            <label  id="role">{{$role->display_name}}</label>
                            <br>
                        @else
                            <input type="checkbox" name="choix[]" value="{{$role->id}}" >
                            <label  id="role">{{$role->display_name}}</label>
                            <br>
                        @endif
                   @endforeach

     </fieldset>
     <button  type="submit" class="btn btn-success">Valider les modifications</button>
     <td><a href="{{route('Comptes')}}"  class="btn btn-primary">Annuler</a></td>
 
</form>

         <!--  ------------------------------------------------------------------------------------>

   


    @endsection