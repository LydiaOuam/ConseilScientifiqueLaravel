@extends('Requetes.accreq')

@section('contenu')
<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Soumettre dossier soutenance:</h6> 
<form  action="{{route('SaveSoutenance')}}" methode="GET" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf


        <div>
        <span style="margin-right:20px;" >Type du Doctorat :</span>
          <input type="radio" id="contactChoice1" name="typedoc" value="LMD">
          <label for="contactChoice1">LMD</label>

          <input type="radio" id="contactChoice2"name="typedoc" value="Doctorat 98">
          <label for="contactChoice2">Doctorat 98</label>

          <input type="radio" id="contactChoice3" name="typedoc" value="Cotutelle">
          <label for="contactChoice3">Cotutelle</label>
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom : </span>
          <input type="text" class="form-control" name="nomPren" >
        </div>


        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Directeur de thèse : </span>
          <input type="text" class="form-control" name="direct">
        </div>

        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Année de la première inscription: </span>
          <input type="text" class="form-control" name="annee">
        </div>
        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Departement: </span>
          <input type="text" class="form-control" name="dep">
        </div>
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Intitule de la thèse: </span>
        <textarea class="form-control" name="intit"></textarea>
        </div>
         <h6>Rapport soutenance:</h6>
        <div class="input-group mb-3">
          <input type="file" class="form-control" name="rapport[]" multiple>
        </div>

        <h6>Brevet d'invention:</h6>
        
        <div class="input-group mb-3">
          <input type="file" class="form-control" name="brevet[]" multiple>
        </div>
        <h6>Communication:</h6>

        
        <div class="input-group mb-3">
          <input type="file" class="form-control" name="communication[]" multiple>
        </div>
        <h6>Publication:</h6>

        
        <div class="input-group mb-3">
          <input type="file" class="form-control" name="publication[]" multiple>
        </div>

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
        <button type="reset" class="btn btn-secondary" style="margin-left:100px;">Annuler</button>

</form>

@endsection