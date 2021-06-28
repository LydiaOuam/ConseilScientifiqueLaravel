@extends('Requetes.accreq')

@section('contenu')

<h6  style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Demande d'abondon d'une thèse : </h6>
  <form  method="POST" action="{{route('saveAbondon')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
  @csrf

      <div class="input-group input-group-sm mb-3" >
      <span  style="margin-right:20px;">Nom et Prénom de directeur : </span>
        <input type="text" class="form-control" name="Directeur">
      </div>

      
      <div class="input-group input-group-sm mb-3" >
      <span  style="margin-right:20px;">Intitulé de la thèse : </span>
        <textarea type="text" class="form-control" name="Intitulé"></textarea>
      </div>



  <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>

      
  
  </form>

@endsection