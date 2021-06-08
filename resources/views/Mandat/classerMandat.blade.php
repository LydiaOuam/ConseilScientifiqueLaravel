@extends('base')
@section('titre')
    Classer un mandat
    @endsection

    
    @section('contenu')
    
    @section('action')
        {{route('AfficherMember')}}
    @endsection
    @foreach($mandat as $object)
<div class="border border-2" style="margin-left:100px;margin-right:100px;margin-top:30px;">
    <h5  style="margin:30px;">Numéro du mandat : {{$object->idMandat}} </h5>
    <h6 style="margin:30px;"> A commencé le : {{$object->dateDeb}} </h6>
    <h6 style="margin:30px;"> Termine  le : {{$object->dateFin}}</h6>
</div>
@endforeach
<div class="d-grid gap-2 col-6 mx-auto">
  <a href="{{route('ClasseM')}}" class="btn btn-primary" type="button" style="margin-top:30px;">Classer</a>

</div>




    @endsection