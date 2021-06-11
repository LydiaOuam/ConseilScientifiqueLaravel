@extends('Requetes.accreq')

@section('contenu')

<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Demande d'inscription en doctorat : </h6>
<form  method="POST" action="{{route('InscDoc')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf

        
        <span style="margin-right:20px;" >Type du Doctorat :</span>
        <div class="form-check form-check-inline" style="margin-left:30px;">
          <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="LMD">
          <label class="form-check-label" for="inlineRadio1">LMD</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Doctorat 98">
          <label class="form-check-label" for="inlineRadio2">Doctorat 98</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="Cotutelle" >
          <label class="form-check-label" for="inlineRadio3">Cotutelle</label>
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Département : </span>
          <input type="text" class="form-control" name="Département" value="{{old('Département')}}">
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom : </span>
          <input type="text" class="form-control" name="Nom" value="{{old('Nom')}}" >
        </div>

        
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom du directeur : </span>
          <input type="text" class="form-control" name="NomDirecteur" value="{{old('NomDirecteur')}}">
        </div>

           
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom du co-directeur : </span>
          <input type="text" class="form-control" name="NomCoDirecteur" value="{{old('NomCoDirecteur')}}" >
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;"> Diplôme d’accès : </span>
          <input type="text" class="form-control" name="Diplôme" value="{{old('Diplôme')}}">
        </div>

       


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Intitulé de la thèse : </span>
          <textarea type="text" class="form-control" name="Intitulé" value="{{old('Intitulé')}}"></textarea>
        </div>


        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
  

     
</form>

@endsection