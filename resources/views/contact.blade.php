@extends('base')
    @section('titre')
    Ajouter un compte
    @endsection

    @section('contenu')
 <!------------------------------CONTACT--------------------------->
        @section('action')
            {{route('Contact')}}
        @endsection
        @csrf
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
  </div>



  <form methode="POST" action="/contact"  style="float:left;width:60%;margin-left:10px;margin-top:30px;"> 
  @csrf
    <div class="input-group mb-3">
      <span class="input-group-text">A :</span>
      <input type="email" class="form-control" name="destinataire" value="{{ old('name')}}">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text">Titre</span>
      <input type="text" class="form-control" name="titre">
    </div>
    <div>
      <textarea class="form-control" rows="6" name="contenu"></textarea>
    </div>
    <div class="d-grid gap-2">
      <button type="Submit" class="btn btn-primary" style="margin-top:10px;">Envoyer</button>
    </div>
  </form>



@endsection
