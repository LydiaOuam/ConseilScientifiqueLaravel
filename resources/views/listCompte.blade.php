@extends('base')

@section('titre')
    Ajouter un compte
    @endsection

    @section('contenu')
    
    @section('action')
        {{route('Comptes')}}
    @endsection

@if(isset($comptes))
  @if(count($comptes) > 0)


<h2>Gérer les comptes</h2>
<table class="table table-hovered" style="margin-top:60px; border: 1px solid #bdc3c7;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Login</th>
      <th scope="col">Mot de passe</th>
      <th colspan=3>Action</th>
      <!-- <th scope="col">Edit</th>
      <th scope="col">Edit</th> -->
    </tr>
  </thead>
 
  <tbody>
              @foreach($comptes as $compte)
                <tr>
                  <th scope="row">{{$compte->id}}</th>
                  <td>{{$compte->login}}</td>
                  <td>{{$compte->password}}</td>
                  <td><a  href="{{route('Profile',[$compte->id])}}" class="btn btn-success">Voir détails/Modifier</a></td>
                  @if($compte->etat == 1)
                    <td><a href="{{route('BloquerCompte',[$compte->id])}}" class="btn btn-primary">Bloquer</a></td>
                  @else
                    <td><a href="{{route('DebloquerCompte',[$compte->id])}}" class="btn btn-primary">Débloquer</a></td>
                  @endif
                  <td><a href="{{route('SupprimerCompte',[$compte->id])}}" class="btn btn-danger">Supprimer</a></td>

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
