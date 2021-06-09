@extends('base')

@section('titre')
    Ajouter des membres
    @endsection

    @section('contenu')
 <!------------------------------AJOUTER UN COMPTE--------------------------->
 @section('action')
        {{route('showDept')}}
    @endsection

   
<nav class="list-group" style="float:left;width:30%;">
<div class="list-group" style="overflow:hidden; overflow-y:scroll;height:200px;margin-top:30px;">

                @foreach($dep as $departe)

  <a href="{{route('AfficherMember',[$departe->idDept])}}" class="list-group-item list-group-item-action" aria-current="true" >
    <div class="d-flex w-100 justify-content-between">
   
      <h5 class="mb-1">{{$departe->name}}</h5>

    </div>

   
  </a>
  @endforeach
</div>
</nav>

<form  method="POST" action="{{route('AjouterMembre')}}"  style="float:left;width:60%;margin-left:10px;margin-top:30px;">
 @csrf

 <div class="mb-3">
                <label for="placeBirth" class="form-label">Ajouter un membre:</label>
               
                 <input list="mem" name="mem" class="form-control">
               
                <datalist id="mem">
                @foreach($comptes as $compte)
                    <option value="{{$compte->id}}">{{$compte->name}} {{$compte->fname}}</option>
                    @endforeach
                  </datalist>

          </div>
  
    <div class="d-grid gap-2">
      <button type="Submit" class="btn btn-primary" style="margin-top:10px;">Ajouter</button>
    </div>



</form>


<footer class="d-grid gap-2">
      <a href="{{route('classer')}}" class="btn btn-success" style="margin-top:10px;">Suivant</a>
    </footer>

@endsection
