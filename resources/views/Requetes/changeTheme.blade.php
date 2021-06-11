@extends('Requetes.accreq')

@section('contenu')


<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Changer thème de thèse : </h6>
<form  method="POST" action="{{route('SaveChan')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Intitulé du sujet de thèse initiale : </span>
          <input type="text" class="form-control" name="IntituléInitial" value="{{old('IntituléInitial')}}">
        </div>
        <div class="input-group input-group-sm mb-3">
        <span  style="margin-right:20px;">Intitulé du nouveau sujet de thèse : </span>
          <input type="text" class="form-control" name="NouveauIntitulé" value="{{old('NouveauIntitulé')}}" >
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Motif: </span>
        <textarea class="form-control" name="Motif"  placeholder="Motif détaillé du changement de thèse" value="{{old('Motif')}}"></textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>


     
     
</form>

@endsection