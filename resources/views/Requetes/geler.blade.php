@extends('Requetes.accreq')

@section('contenu')
<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Geler l'inscription : </h6>
<form  method="POST" action="{{route('SavGeler')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf
 
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom : </span>
          <input type="text" class="form-control" name="Nom">
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Observation eventuelles: </span>
        <textarea class="form-control" aria-label="With textarea" placeholder="Vous pouvez expliques les raisons pour lesquelles vous voulez geler votre inscription" name="observation"></textarea>
        </div>
      

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>


     
</form>

@endsection