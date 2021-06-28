@extends('Requetes.accreq')

@section('contenu')<h6  style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Demander un séjour scientifique: </h6>
  <form  method="POST" action="{{route('SaveSej')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
  @csrf


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Pays de destination : </span>
          <input type="text" class="form-control" name="Pays"  value="{{old('Pays')}}">
        </div>
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Etablissement d'accueil : </span>
          <input type="text" class="form-control" name="Etablissement"  value="{{old('Etablissement')}}">
        </div>

        <div class="input-group input-group-sm mb-3">
        <span  style="margin-right:20px;">Date début de séjour: </span>
          <input type="date" class="form-control" name="Début"  value="{{old('Début')}}">
        </div>
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Date fin de séjour: </span>
        <input type="date" class="form-control" name="Fin" min="Début" value="{{old('Fin')}}" >

        </div>
        </div>
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Responsable de stage: </span>
        <input type="text" class="form-control" name="Responsable"  value="{{old('Responsable')}}">

        </div>

  <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>


@endsection