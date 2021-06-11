@extends('Requetes.accreq')

@section('contenu')

<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Demander d'une année sabbatique: </h6> 
<form  method="POST" action="{{route('saveAnneeSab')}}" enctype="multipart/form-data" style="margin-top=20px;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et prénom : </span>
          <input type="text" class="form-control" name="nom" >
        </div>


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Pays de detisnation : </span>
          <input type="text" class="form-control" name="detisnation" >
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Etablissement d'accueil : </span>
          <input type="text" class="form-control" name="etablissement">
        </div>

        <div class="input-group input-group-sm mb-3" >
          <span  style="margin-right:20px;">Date début de séjour: </span>
          <input type="date" class="form-control" name="DateDébut" >
        </div>

          <div class="input-group input-group-sm mb-3" >
          <span  style="margin-right:20px;">Date fin de séjour: </span>
          <input type="date" class="form-control" name="DateFin">
          </div>
        


        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>


     
     
</form>

@endsection