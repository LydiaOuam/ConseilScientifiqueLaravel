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
   
      <h5 class="mb-1">{{$departe->name}}</h5>

    </div>

   
  </a>
  @endforeach
</div>
</nav>



<form methode="POST" action="{{route('AjouterMembre')}}"  style="float:left;width:30%;">
  @csrf
      <div class="mb-3" style="margin-top:20px;">
           
                <input list="membre" name="membre" class="form-control" style="width:500px;margin-left:20px;">
                <datalist id="membre">
                @foreach($comptes as $compte) 
                    <option value="{{$compte->id}}">{{$compte->name}} {{$compte->fname}}</option>
                    @endforeach 
                </datalist>
                
            </div>
             
    <button class="btn btn-primary" type="submit" style="margin-left:30px;" >Ajouter</button>
</form>


@endsection
