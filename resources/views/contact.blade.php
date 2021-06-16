
@extends('lien')
    @section('titre')
    Message
    @endsection

    @section('contenu')
 <!------------------------------AJOUTER UN COMPTE--------------------------->

   
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

<form  method="POST" action="{{route('Envoyer')}}"  style="float:left;width:60%;margin-left:10px;margin-top:30px;">
 @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Destinataire:</label>
    <!-- <input type="email" class="form-control typeahead" name="email" value="{{old('email')}}" >  -->
    <input class="form-control" list="datalistOptions" id="exampleDataList" name="email" >
                    <datalist  id="datalistOptions">
                    @foreach($users as $user)
                        <option value="{{$user->login}}">{{$user->name}} {{$user->fname}}</option>
                        
                    @endforeach
                       
                    </datalist>

  </div>
  <div class="mb-3">
    <label for="titre" class="form-label">Titre</label>
    <input type="text" class="form-control" name="titre" value="{{old('titre')}}">
  </div>
  <div>
      <textarea class="form-control" rows="6" name="contenu" >{{old('contenu')}}</textarea>
    </div>
    <div class="d-grid gap-2">
      <button type="Submit" class="btn btn-primary" style="margin-top:10px;">Envoyer</button>
    </div>

</form>

<button  onclick="window.history.back();" class="btn btn-primary" type="button" style="margin-top:20px;margin-bottom:20px;">Revenir a l'accueil</button>

@endsection





