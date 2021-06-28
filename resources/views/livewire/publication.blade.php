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
        <span  style="margin-right:20px;">Directeur de thèse : </span>
          <input type="text" class="form-control" name="direct">
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Année de la première inscription: </span>
          <input type="text" class="form-control" name="annee">
        </div>
  
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Intitulé de la thèse: </span>
        <textarea class="form-control" name="intit"></textarea>
        </div>
        <div  class="mb-3">
                    <label for="rapport" class="form-label"> <h6>Rapport soutenance:</h6></label>
                    <input  type="file"  accept="application/pdf" class="form-control" name="rapport[]" multiple>
            </div> 
            <div class="mb-3">
        <label for="rapport" class="form-label"> <h6>Brevet d'invention:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="brevet[]" multiple>
        </div>

        <div class="mb-3">
        <label for="rapport" class="form-label"> <h6>Publications:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="brevet[]" multiple>
        </div>

        


<div class="card">
  <div class="card-header">
    Publications:
  </div>
  <div class="card-body">
  
<div class="input-group mb-3">
  <span class="input-group-text" >Liste des Auteurs: (dans l'ordre)</span>
  <textarea class="form-control" name="ListeAuteurs" placeholder="Prénom Nom, . . . . . . . . . . . . . . . . . . . . . . . . , Prénom Nom,"></textarea>
</div> 
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Titre de la publication:</span>
  <input type="text" class="form-control" name = "TitrePublication">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Nom de la revue:</span>
  <input type="text" class="form-control" name = "NomRevue">
</div>



<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Impact factor:</span>
  <input type="number" class="form-control" name="ImpactFactor">
</div>


<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">SJR:</span>
  <input type="number" class="form-control" name="SJR">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Date de soumission:</span>
  <input type="date" class="form-control" name="DateSoumission">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Date d'acceptation:</span>
  <input type="date" class="form-control" name="DateAcceptation">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Date de parution:</span>
  <input type="date" class="form-control"name="DateApparution">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">URL de la revue:</span>
  <input type="text" class="form-control"name="URL_Revue">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">URL du papier:</span>
  <input type="text" class="form-control" name="URL_papier">
</div>
<div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="ajoutePubl">+Ajouter une autre publication</button>
                    </div>
                </div>


  </div>
</div>


     <button  type="submit" class="btn btn-success">Envoyer</button>
    
 
</form>

