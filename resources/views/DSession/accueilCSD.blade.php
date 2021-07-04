@extends('DSession.accueil')
    @section('titre')
       Accueil CSD
    @endsection

@section('scontent')

@section('creer')
<li><a class="dropdown-item" href="{{route('planiCsd')}}">Planifier une session CSD</a></li>
<li><a class="dropdown-item" href="{{route('sessionCSD')}}">Initier une session</a></li>

@endsection



@endsection

