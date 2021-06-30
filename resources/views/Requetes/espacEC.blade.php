@extends('Requetes.accreq')

@section('contenu')
<form action="{{route('ReqChoix')}}" method="POST">
@csrf
    <div class="mb-3" style="margin-top:30px;margin-left:30px; margin-right:30px;">
    <h5>Choisir le type de la requête à soumettre</h5>
                    <select name="typereq" class="form-select form-select-sm" >

                        @foreach($points as $point)

                            <option value="{{$point->id}} ">{{$point->nom}}</option>
                        @endforeach
                        </select>
                    <button type="submit"class="btn btn-success " style="margin-left:30px;width:200px;margin-top:30px;">Suivant</button>
                </div>
                </form>

@endsection