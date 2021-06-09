@extends('Requetes.accreq')

@section('contenu')
<span >Type du Doctorat :</span>
<div class="form-check form-check-inline" style="margin-left:30px;">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">LMD</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Doctorat 98</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
  <label class="form-check-label" for="inlineRadio3">Cotutelle</label>
</div>


<div class="input-group input-group-sm mb-3" style="width:300px;">
<span>Nom et prenom : </span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>


<div class="input-group input-group-sm mb-3" style="width:300px;">
<span>Directeur de these : </span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>

<div class="input-group input-group-sm mb-3" style="width:300px;">
<span>Annee de la premiere inscription: </span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="input-group input-group-sm mb-3" style="width:300px;">
<span>Intitule du theme: </span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>


@endsection