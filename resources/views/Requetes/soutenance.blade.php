@extends('Requetes.accreq')

@section('contenu')
<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Soumettre dossier soutenance:</h6> 
<form  method="POST" action="{{route('SaveSoutenance')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf

          <span style="margin-right:20px;" >Type du Doctorat :</span>
          <input type="radio" id="contactChoice1" name="typedoc" value="LMD">
          <label for="contactChoice1">LMD</label>

          <input type="radio" id="contactChoice2"name="typedoc" value="Doctorat 98">
          <label for="contactChoice2">Doctorat 98</label>

          <input type="radio" id="contactChoice3" name="typedoc" value="Cotutelle">
          <label for="contactChoice3">Cotutelle</label>

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
        <span  style="margin-right:20px;">Département: </span>
          <input type="text" class="form-control" name="dep">
        </div>
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Intitulé de la thèse: </span>
        <textarea class="form-control" name="intit"></textarea>
        </div>
        <div  class="mb-3">
                    <label for="rapport" class="form-label"> <h6>Rapport soutenance:</h6></label>
                    <input  type="file"  class="form-control" name="rapport[]" multiple>
            </div> 
            <div class="mb-3">
        <label for="rapport" class="form-label"> <h6>Brevet d'invention:</h6></label>
          <input type="file" class="form-control" name="brevet[]" multiple>
        </div>

        
        <div class="mb-3">
        <label for="rapport" class="form-label"><h6>Publication:</h6></label>
          <input type="file" class="form-control" name="publication[]" multiple>
        </div>


            <div  class="mb-3">
                    <label for="photo" class="form-label">Ajouter une photo</label>
                    <input class="form-control" type="file" id="photo" name="photo[]" multiple>
            </div> 

               
     <button  type="submit" class="btn btn-success">Envoyer</button>
    
 
</form>

@endsection