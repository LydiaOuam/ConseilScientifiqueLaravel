@extends('Requetes.accreq')

@section('contenu')
<form action="{{route('ReqChoix')}}" method="POST">
@csrf
    <div class="mb-3" style="margin-top:30px;margin-left:30px; margin-right:30px;">
    <h5>Choisir le type de la requête à soumettre</h5>
                    <input list="types" name="typereq" id="typereq"  class="form-control" >
                    <datalist id="types">
                    @foreach($points as $point)
                        <option value="{{$point->id}}">{{$point->nom}}</option>
                        
                    @endforeach
                       
                    </datalist>
                    <button type="submit"class="btn btn-success " style="margin-left:30px;width:200px;margin-top:30px;">Suivant</button>
                </div>
                </form>

@endsection