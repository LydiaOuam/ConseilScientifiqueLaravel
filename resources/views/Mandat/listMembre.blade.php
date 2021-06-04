@extends('base')
@section('titre')
    Ajouter des membres
    @endsection

    
    @section('contenu')
    
    @section('action')
        {{route('AfficherMember')}}
    @endsection
    <h2>Ajouter des membres</h2>
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
                    <td><a  href="{{route('AjouterMember',[$compte->id])}}" class="btn btn-success">Ajouter</a></td>
                    </tr>
                @endforeach 
        </tbody>
    </table>
        <span>
            {{$comptes->links()}}
        </span>
        @endsection