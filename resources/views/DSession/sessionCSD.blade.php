@extends('DSession.accueilCSD')

  @section('titre')
        Traitement des requêtes
    @endsection
@extends('DSession.sessiontraiter')

@section('avis')
<div class="card"  style=" margin-left:30px;margin-right:30px;margin-top:50px;">
  <div class="card-header">
    Décision
  </div>
  <div class="card-body">
  @foreach($requetes as $requete)
      @foreach($decisions as $decision)
      @if($requete->idRequete == $decision->idRequete)
        @if($decision->avis == 'Favorable')
       
          <h6>  {{$decision->name}}  {{$decision->fname}} </h6>
          <h6 style="color:green">{{$decision->avis}}</h6> 
        @elseif($decision->avis == 'Défavorable')
        <h6>  {{$decision->name}}  {{$decision->fname}} </h6>
          <h6 style="color:red">{{$decision->avis}}</h6> 
        @endif
      @endif
      @endforeach
    @endforeach
  </div>
</div>
@endsection