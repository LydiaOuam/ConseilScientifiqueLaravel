@extends('Requetes.accreq')

@section('contenu')

<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Soumettre un nouveau projet de reherche: </h6> 
<form  method="POST" action="{{route('SaveNrech')}}" enctype="multipart/form-data" style="margin-top=20px;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf

     
        <div class="input-group input-group-sm mb-3" >
          <span  style="margin-right:20px;">Intitulé du projet: </span>
          <input type="text" class="form-control" name="Intitulé" >
        </div>

        <div class="input-group input-group-sm mb-3" >
          <span  style="margin-right:20px;">Chef du projet: </span>
          <input type="text" class="form-control" name="Chef" >
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Membres: </span>
        <textarea class="form-control" aria-label="With textarea" name="membre"></textarea>
        </div>

        
        
        <div class="mb-3">
        <label for="rapport" class="form-label"><h6>Le rapport:</h6></label>
          <input type="file" class="form-control" name="rapport">
        </div>


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Observation: </span>
        <textarea class="form-control" aria-label="With textarea" name="observation"></textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>     
</form>

@endsection