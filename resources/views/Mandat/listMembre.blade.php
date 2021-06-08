@extends('base')
@section('titre')
    Ajouter des membres
    @endsection

    
    @section('contenu')
    
    @section('action')
        {{route('AfficherMember')}}
    @endsection

@if(isset($comptes))


  <h4 style="margin-top:40px;margin-left:20px;">Ajouter des membres</h4>
  <form methode="POST" action="{{route('AjouterMembreMandat')}}" >
  @csrf
            <div class="mb-3" style="margin-top:20px;">
            @foreach($comptes as $compte) 
                <input list="membre" name="membre" class="form-control" style="width:500px;margin-left:20px;" >
                <datalist id="membre">
                    <option name="membre">{{$compte->name}} {{$compte->fname}}</option>
                    @endforeach 
                </datalist>
                
            </div>
             
    <button class="btn btn-primary" type="submit" style="margin-left:30px;" >Ajouter</button>
</form>

@endif


    <a class="btn btn-success" href="{{route('classer')}}" style="margin-left:30px;" >Suivant</a>


        @endsection