@extends('Requetes.accreq')

@section('contenu')

<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Rajouter un co-directeur : </h6>
<form  method="POST" action="{{route('SaveRajouter')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom du co-directeur : </span>
          <input type="text" class="form-control" name="nomDirecteur">
        </div>


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Observation: </span>
        <textarea class="form-control" aria-label="With textarea" name="observation"></textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
        <button type="reset" class="btn btn-secondary" style="margin-left:100px;">Annuler</button>

     
     
</form>

@endsection