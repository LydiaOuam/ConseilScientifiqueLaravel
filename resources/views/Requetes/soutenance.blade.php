@extends('Requetes.accreq')

@section('contenu')

<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Soumettre dossier soutenance:</h6> 
<form  method="POST" action="{{route('SaveSoutenance')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf

          <span style="margin-right:20px;" >Type du Doctorat :</span>
          <input type="radio" id="contactChoice1" name="typedoc" value="LMD">
          <label for="contactChoice1">LMD</label>

          <input type="radio" id="contactChoice2"name="typedoc" value="Doctorat 98">
          <label for="contactChoice2">Doctorat 98</label>


        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Directeur de thèse : </span>
          <input type="text" class="form-control" name="direct">
        </div>

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Année de la première inscription: </span>
          <input type="text" class="form-control" name="annee">
        </div>
  
        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Intitulé de la thèse: </span>
        <textarea class="form-control" name="intit"></textarea>
        </div>
        <div  class="mb-3">
                    <label for="rapport" class="form-label"> <h6>Rapport soutenance [Long]:</h6></label>
                    <input  type="file"  accept="application/pdf" class="form-control" name="rapport" >
            </div> 

            <div  class="mb-3">
                    <label for="rapportC" class="form-label"> <h6>Rapport soutenance [Court]:</h6></label>
                    <input  type="file"  accept="application/pdf" class="form-control" name="rapportC" >
            </div>
            <div class="mb-3">
        <label for="rapport" class="form-label"> <h6>Brevet d'invention:</h6></label>
          <input type="file" accept="application/pdf" class="form-control" name="brevet[]" multiple>
        </div>



        <div class="card">

            <table class="table"  id="products_table">
            <thead>
                    
            <div class="card-header">
              Publications:
            </div>
          </thead>
          <tbody >
          <div class="card-body">  
            <div  id="product0">

                  <div class="input-group mb-3">
                    <span class="input-group-text" >Liste des Auteurs: (dans l'ordre)</span>
                    <textarea class="form-control" name="ListeAuteurs[]" placeholder="Prénom Nom, . . . . . . . . . . . . . . . . . . . . . . . . , Prénom Nom,"></textarea>
                  </div> 

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Titre de la publication:</span>
                    <input type="text" class="form-control" name = "TitrePublication[]">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nom de la revue :</span>
                    <input type="text" class="form-control" name = "NomRevue[]">
                  </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Impact factor :</span>
                      <input step="any" class="form-control"   type="text"
                          pattern="(^[0-9]{0,2}$)|(^[0-9]{0,2}\.[0-9]{0,5}$)"
                          step="any"
                          maxlength="7"
                          validate="true" placeholder="33.3" name="ImpactFactor[]">
                    </div>


                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">SJR:</span>
                      <input  class="form-control"   type="text"
                            pattern="(^[0-9]{0,2}$)|(^[0-9]{0,2}\.[0-9]{0,5}$)"
                            step="any"
                            maxlength="7"
                            validate="true" placeholder="33.3"  name="SJR[]">
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Date de soumission:</span>
                      <input type="date" class="form-control" name="DateSoumission[]">
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Date d'acceptation:</span>
                      <input type="date" class="form-control" name="DateAcceptation[]">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Date de parution:</span>
                      <input type="date" class="form-control"name="DateApparution[]">
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon3">URL de la revue:</span>
                      <input type="text" class="form-control"name="URL_Revue[]">
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon3">URL du papier:</span>
                      <input type="text" class="form-control" name="URL_papier[]">
                    </div>
            </div>
              <div id="product1"></div>
          </div>
          </tbody>
            </table>
                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row" class="btn btn-secondary">+  Ajouter une publication</button>
                        <button id='delete_row'  class="btn btn-light">-  Supprimer une publication</button>
                    </div>
                </div>
        </div>



        

        <div class="card" style="margin-top:20px;margin-bottom:20px;">

            <table class="table"  id="communication_table">
            <thead>
                    
            <div class="card-header">
              Communications internationales:
            </div>
          </thead>
          <tbody >
          <div class="card-body">  
            <div  id="communication0">

                  <div class="input-group mb-3">
                    <span class="input-group-text" >Liste des Auteurs: (dans l'ordre)</span>
                    <textarea class="form-control" name="ListeAuteurCom[]" placeholder="Prénom Nom, . . . . . . . . . . . . . . . . . . . . . . . . , Prénom Nom,"></textarea>
                  </div> 
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Titre de la communication:</span>
                    <input type="text" class="form-control" name = "TitreCom[]">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Intitulé de la conférence:</span>
                    <input type="text" class="form-control" name = "NomCom[]">
                  </div>

                  <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Date de la conférence :</span>
                      <input type="date" class="form-control" name="DateDebCom[]">
                      <span class="input-group-text">à</span>
                      <input type="date" class="form-control" name="DateFinCom[]" >
                    </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Lieu de la conférence:</span>
                    <input type="text" class="form-control" name = "LieuCom[]">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">URL de la conférence:</span>
                    <input type="text" class="form-control" name = "URLCom[]">
                  </div>
               
                  
                   
            </div>
              <div id="communication1"></div>
          </div>
          </tbody>
            </table>
                <div class="row">
                    <div class="col-md-12">
                        <button id="add_com" class="btn btn-secondary">+  Ajouter une communication</button>
                        <button id='delete_com'  class="btn btn-light">-  Supprimer une communication</button>
                    </div>
                </div>
        </div>


        
  
    <div>
        <input class="btn btn-success" type="submit" value="Envoyer">
    </div>

 
</form>


<script>
$(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>


<script>
$(document).ready(function(){
    let row_number = 1;
    $("#add_com").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#communication' + row_number).html($('#communication' + new_row_number).html()).find('td:first-child');
      $('#communication_table').append('<tr id="communication' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_com").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#communication" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>
@endsection
