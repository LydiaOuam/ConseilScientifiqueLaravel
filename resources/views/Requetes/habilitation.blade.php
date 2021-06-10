@extends('Requetes.accreq')

@section('contenu')

<form action="" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
    <h6>Soumettre dossier habilitation universitaire:</h6> 

     

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et prenom : </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>


    
        <div class="input-group input-group-sm mb-3" ">
        <span  style="margin-right:20px;">Departement: </span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
      
         <h6>Curriculum vitae:</h6>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile01">
        </div>

        <h6>Les Brevets d'invention:</h6>
        
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Description: </span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile01">
        </div>
        <h6>Les Communications:</h6>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Description: </span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile01">
        </div>
        <h6>Les Publications:</h6>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Description: </span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        <h6>Les Animations scientifiques:</h6>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Description: </span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        <h6>Les Responsabilitees:</h6>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Description: </span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>

        <h6>Les Revues:</h6>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Description: </span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>




        
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile01">
        </div>

        <button type="submit" class="btn btn-success" style="margin-left:50px;">Soumettre</button>
        <button type="reset" class="btn btn-secondary" style="margin-left:100px;">Annuler</button>

     
     
</form>

@endsection