@extends('base')

@section('titre')
Gérer les comptes
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
                  <td>


                    <button type="button"  class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Supprimer
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          Etes-vous sûr de vouloir supprimer?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a href="{{route('SupprimerCompte',[$compte->id])}}" class="btn btn-success" >Confirmer</a>
                          </div>
                        </div>
                      </div>
                    </div></td>

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
