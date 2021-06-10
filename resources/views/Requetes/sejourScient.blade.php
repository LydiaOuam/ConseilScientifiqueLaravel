@extends('Requetes.accreq')

@section('contenu')

<form action="" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
    <h6>Demander un sejour scientifique: </h6> 


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et prenom : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>


        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Pays de detisnation : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Etablissement d'accueil : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Date debut de sejour: </span>
          <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Date fin de sejour: </span>
        <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

        </div>
        </div>
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Responsable de stage: </span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

        </div>
         

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
        <button type="reset" class="btn btn-secondary" style="margin-left:100px;">Annuler</button>

     
     
</form>

@endsection