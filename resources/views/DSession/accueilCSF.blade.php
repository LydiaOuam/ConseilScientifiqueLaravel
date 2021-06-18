@extends('DSession.accueil')
    @section('titre')
       Accueil CSF 
    @endsection

@section('scontent')

@section('creer')
<li><a class="dropdown-item" href="{{route('SessionCSF')}}">Planifier une session CSF</a></li>
<li><a class="dropdown-item" href="{{route('traiterRequete')}}">Initier une session</a></li>
@endsection




<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection