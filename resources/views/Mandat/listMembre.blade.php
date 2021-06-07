@extends('base')
@section('titre')
    Ajouter des membres
    @endsection

    
    @section('contenu')
    
    @section('action')
        {{route('AfficherMember')}}
    @endsection

@if(isset($comptes))
  @if(count($comptes) > 0)
    <h4 style="margin-top:40px;margin-left:20px;">Ajouter des membres</h4>
        <table class="table table-hovered" style="margin-top:50px; border: 1px solid #bdc3c7;">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th colspan=3>Action</th>

            </tr>
        </thead>
        
  <tbody>
              @foreach($comptes as $compte)
                    <tr>
                    <th scope="row">{{$compte->id}}</th>
                    <td>{{$compte->name}}</td>
                    <td>{{$compte->fname}}</td>
                    <td><a  href="{{route('AjouterMembreMandat',[$compte->id])}}" class="btn btn-success">Ajouter</a></td>
                    </tr>
                @endforeach 
        </tbody>
        @else <h3>Aucun résultat</h3>
      @endif
</table>
@endif
        <span>
            {{$comptes->links()}}
        </span>

        @endsection