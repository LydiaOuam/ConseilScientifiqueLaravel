@extends('base')

@section('titre')
    Message | Repondre
    @endsection

    @section('contenu')
 <!------------------------------AJOUTER UN COMPTE--------------------------->
 @section('action')
        {{route('Contact')}}
    @endsection

<form  method="POST" action="{{route('Envoyer')}}"  style="width:60%;margin-left:200px;margin-top:30px;border">
 @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control"name="email" value="{{$content->expéditeur}}">
  </div>
  <div class="mb-3">
    <label for="titre" class="form-label">Titre</label>
    <input type="text" class="form-control" name="titre" value="Re: {{$content->titre}}">
  </div>
  <div>
      <textarea class="form-control" rows="6" name="contenu" ></textarea>
    </div>
    <div class="d-grid gap-2">
      <button type="Submit" class="btn btn-primary" style="margin-top:10px;">Repondre</button>
    </div>

</form>
@endsection