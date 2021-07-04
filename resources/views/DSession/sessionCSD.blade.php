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
      @foreach($decisions as $decision)
        @if($decision->avis == 'Favorable')
          <h6 style="color:green">{{$decision->avis}}</h6> 
        @elseif($decision->avis == 'Défavorable')
          <h6 style="color:red">{{$decision->avis}}</h6> 
        @endif
      @endforeach
  </div>
</div>
@endsection