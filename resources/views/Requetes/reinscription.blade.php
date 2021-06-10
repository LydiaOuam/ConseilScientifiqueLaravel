@extends('Requetes.accreq')

@section('contenu')

<form action="" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">


        <h6>Demnade de reinscription en doctorat : </h6>
        
        <span style="margin-right:20px;" >Type du Doctorat :</span>
        <div class="form-check form-check-inline" style="margin-left:30px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
          <label class="form-check-label" for="inlineRadio1">LMD</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">Doctorat 98</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
          <label class="form-check-label" for="inlineRadio3">Cotutelle</label>
        </div>

        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Departement : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Nom et Prénom : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        
        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Nom et Prénom de directeur : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

           
        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Nom et Prénom de co-directeur : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;"> Diplôme d’accès : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

       


        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Intitulé de la thèse : </span>
          <textarea type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></textarea>
        </div>


        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
        <button type="reset" class="btn btn-secondary" style="margin-left:100px;">Annuler</button>

     
</form>

@endsection