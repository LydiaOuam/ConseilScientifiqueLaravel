@extends('base')
    @section('titre')
    Message
    @endsection

    @section('contenu')
 <!------------------------------AJOUTER UN COMPTE--------------------------->
 @section('action')
        {{route('Contact')}}
    @endsection

   
<nav style="float:left;width:30%;">
  <ul style="overflow:hidden; overflow-y:scroll;height:200px;margin-top:30px;">
  <li>ahhhhhhhhhhhhhhhh</li>
  <li>akkkkkkkkkkkkkkkkkkkk</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  <li>a</li>
  </ul>
  </nav>


<form  method="POST" action="{{route('Envoyer')}}"  style="float:left;width:60%;margin-left:10px;margin-top:30px;">
 @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control"name="email" value="{{old('email')}}">
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

@endsection


