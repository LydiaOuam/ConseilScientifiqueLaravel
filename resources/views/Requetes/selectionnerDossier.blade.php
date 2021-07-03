@extends('Requetes.directeurThese')

@section('contenu')

    <div class="mb-3" style="margin-top:30px;margin-left:30px; margin-right:30px;">
    <h5>Selectionner le dossier </h5>
    @foreach($resultats as $resultat)
    <form method="POST" action="{{route('selectDossier',$resultat->id)}}">
    @csrf
                  <button type="submit" class="list-group-item list-group-item-action" aria-current="true" >
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{$resultat->name}} {{$resultat->fname}}</h5>
                      </div>
                  </button>
                    
</form>

@endforeach
  
         

                  

@endsection