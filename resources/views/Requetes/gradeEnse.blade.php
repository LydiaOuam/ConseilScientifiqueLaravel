@extends('Requetes.accreq')

@section('contenu')

<form action="" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">


        <h6>Soumettre une nouvelle offre de formation: </h6>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Grade actuel: </span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Promotion: </span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        <h6>Fichier:</h6>
        
       
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile01">
        </div>


        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
        <button type="reset" class="btn btn-secondary" style="margin-left:100px;">Annuler</button>

     
     
</form>

@endsection