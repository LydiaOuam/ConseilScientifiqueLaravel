@extends('Requetes.accreq')

@section('contenu')

<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Soumettre dossier habilitation universitaire:</h6>
<form  method="POST" action="{{route('SaveHabilitation')}}" enctype="multipart/form-data" style="margin-top=10px;padding:20px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf


        <div class="mb-3">
        <label for="cv" class="form-label"><h6>Curriculum vitae:</h6></label>
          <input type="file"  accept="application/pdf"class="form-control" name="cv">
        </div>

        <div class="mb-3">
        <label for="brevet" class="form-label"><h6>Les Brevets d'invention:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="brevet[]" multiple>
        </div>


        <div class="mb-3">
        <label for="communication" class="form-label"><h6>Les Communications:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="communication[]" multiple>
        </div>

        <div class="mb-3">
        <label for="publication" class="form-label"><h6>Les Publications:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="publication[]" multiple>
        </div>

        <div class="mb-3">
        <label for="animation" class="form-label"><h6>Les Animations scientifiques:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="animation[]" multiple>
        </div>

        <div class="mb-3">
        <label for="responsabilités" class="form-label"><h6>Les Responsabilités:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="responsabilités[]" multiple>
        </div>

        <div class="mb-3">
        <label for="revues" class="form-label"><h6>Les Revues:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="revues[]" multiple>
        </div>

  
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;height:100px;">Observation éventuelles: </span>
        <textarea class="form-control" aria-label="With textarea" placeholder="Vous pouvez ici :
        Saisir les données d'un polycopié validé par le CSF
        Et/Ou ajouter des remarques ..." name="observation"></textarea>
        </div>
      
        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
   
</form>

@endsection