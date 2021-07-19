
@extends('base')
    @section('titre')
    Ajouter des membres
    @endsection

    @section('contenu')
 <!------------------------------AJOUTER UN COMPTE--------------------------->
 @section('action')
        {{route('Contact')}}
    @endsection

   
<nav class="list-group" style="float:left;width:30%;">
<div class="list-group" style="overflow:hidden; overflow-y:scroll;height:200px;margin-top:30px;">

                @foreach($dep as $departe)

  <a href="{{route('AfficherMember',[$departe->idDept])}}" class="list-group-item list-group-item-action" aria-current="true" >
    <div class="d-flex w-100 justify-content-between">
   
      <h5 class="mb-1">{{$departe->dname}}</h5>

    </div>

   
  </a>
  @endforeach
</div>
</nav>


@endsection





