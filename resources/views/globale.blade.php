@extends('base')
    @section('titre')
    Message
    @endsection

    @section('contenu')
 <!------------------------------AJOUTER UN COMPTE--------------------------->
 @section('action')
        {{route('Contact')}}
    @endsection

   
<nav class="list-group" style="float:left;width:30%;">
<div class="list-group" style="overflow:hidden; overflow-y:scroll;height:200px;margin-top:30px;">
@foreach($messages as $message)

  <a href="#" class="list-group-item list-group-item-action" aria-current="true" >
    <div class="d-flex w-100 justify-content-between">
    @if($message->vu == 0)
      <h5 class="mb-1">{{$message->titre}}</h5>
    @else
    <p class="mb-1">{{$message->titre}}</p>
    @endif
      <small>{{$message->created_at}}</small>
    </div>
    <p class="mb-1">{{substr($message->contenu,0,30)}}...</p>
   
  </a>
  @endforeach
</div>
</nav>

@yield('contentpro')

@endsection