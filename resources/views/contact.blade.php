@extends('base')
    @section('titre')
    Ajouter un compte
    @endsection

    @section('contenu')
 <!------------------------------CONTACT--------------------------->
        @section('action')
            {{route('Contact')}}
        @endsection

<nav style="float:left;width:30%;">
<ul style="overflow:hidden; overflow-y:scroll;height:200px;">
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

<form  style="float:left;width:60%;margin-left:10px;> 
<div class="input-group mb-3">
  <span class="input-group-text">A :</span>
  <input type="text" class="form-control">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Titre</span>
  <input type="text" class="form-control">
</div>
<div>
  <textarea class="form-control" rows="6"></textarea>
</div>
<div class="d-grid gap-2">
  <button type="Envoyer" class="btn btn-primary" style="margin-top:10px;">Envoyer</button>
</div>
</form>


@endsection