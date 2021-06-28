@extends('Requetes.accreq')

@section('contenu')
<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Soumettre un chahier de charge d'une formation:  </h6> 
<form  method="POST" action="{{route('savemodifierCahier')}}" enctype="multipart/form-data" style="margin-top=20px;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf



        <div class="mb-3">
        <label for="cahier" class="form-label"> <h6>Le cahier de charge:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="cahier">
        </div>


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Observation: </span>
        <textarea class="form-control" aria-label="With textarea" name="observation" placeholder="Vous pouvez decrire ici les modifications apportées "></textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
        <button type="reset" class="btn btn-secondary" style="margin-left:100px;">Annuler</button>

     
     
</form>

@endsection