@extends('Requetes.accreq')

@section('contenu')

<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Changer directeur de thèse :  </h6>
<form  method="POST" action="{{route('saveChanerDir')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom de directeur de thèse actuel : </span>
          <input type="text" class="form-control" name="NomDirecteurActuel" value="{{old('NomDirecteurActuel')}}">
        </div>

        <div class="input-group input-group-sm mb-3">
        <span  style="margin-right:20px;">Nom et Prénom de directeur : </span>
          <input type="text" class="form-control" name="NomDirecteur" value="{{old('NomDirecteur')}}">
        </div>



        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Motif: </span>
        <textarea class="form-control" name="Motif" value="{{old('Motif')}}"></textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>

     
     
</form>

@endsection