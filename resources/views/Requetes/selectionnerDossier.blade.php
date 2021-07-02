@extends('Requetes.directeurThese')

@section('contenu')
<form  method="POST">
@csrf
    <div class="mb-3" style="margin-top:30px;margin-left:30px; margin-right:30px;">
    <h5>Selectionner le dossier </h5>

  
            <select name="dossier" class="form-select form-select-sm" >

            @for($i = 0; $i <= 1 ;$i++)
                    <option value="{{$user[$i]['id']}} " >{{$user[$i]['name']}} {{$user[$i]["fname"]}}</option>
            @endfor
            </select>


                    <button type="submit"class="btn btn-success " style="margin-left:30px;width:200px;margin-top:30px;">Suivant</button>
                </div>
                </form>

@endsection