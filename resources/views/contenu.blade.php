

@extends('base')
    @section('titre')
    Message
    @endsection

    @section('contenu')
 @section('action')
        {{route('Contact')}}
    @endsection

   
<nav class="list-group" style="float:left;width:30%;">
<div class="list-group" style="overflow:hidden; overflow-y:scroll;height:200px;margin-top:30px;">
@foreach($messages as $message)

  <a href="{{route('DetailMessage',[$message->id])}}" class="list-group-item list-group-item-action" aria-current="true" >
    <div class="d-flex w-100 justify-content-between">
    @if($message->vu == 0)
      <h5 class="mb-1">{{$message->titre}}</h5>
    @else
    <p class="mb-1">{{$message->titre}}</p>
    @endif
      <small>{{$message->created_at}}</small>
    </div>
    <p class="mb-1">{{substr($message->contenu,0,30)}}</p>
   
  </a>
  @endforeach
</div>
</nav>

<div style="float:left;width:60%;margin-left:10px;margin-top:30px;">
<div style="border-style: inset;">
  <div class="mb-3">
    <h3 style="padding-left:10px;">Objet:{{$content->titre}}</h3>
  </div>
  <div>
    <small  style="padding-left:10px;"> de : {{$content->expéditeur}}</small>
  </div>
  <small  style="padding-left:10px;"> à : {{$content->destinataire}}</samll>
  <div style="margin-top:20px;">
     <p  style="padding-left:10px;"> {{$content->contenu}}</p>
    </div>
    </div>
    <a href="{{route('Repondre',[$content->id])}}" class="btn btn-primary" style="margin-top:10px;">Repondre</a>
</div>


  @endsection