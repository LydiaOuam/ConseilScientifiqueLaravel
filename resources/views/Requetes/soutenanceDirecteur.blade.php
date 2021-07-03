@extends('Requetes.directeurThese')

@section('contenu')
@foreach($details as $detail)
<form  method="POST" action="{{route('saveJury',$detail->idRequete)}}" enctype="multipart/form-data"style="margin-top:40px ;padding:10px 70px;border-style: solid;border-color: white;border-width: 2px;padding: 5px;width: 80%;margin-left: 10%;">
  @csrf
@endforeach

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Proposer Jury soutenance
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">

            <table class="table" id="jury">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Grade</th>
                        <th>Qualité</th>
                        <th>Organisme</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="jury">
                        <td>
                        <div class="input-group mb-3">
                        <input name="nompresident" type="text" class="form-control">
                        </div>
                                                    
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input name="prenomPresident" type="text" class="form-control" >
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <select  name="GradePresident" class="form-control">
                            <option  value="Maître assistant A" >Maître assistant A</option>
                            <option  value="Maître assistant B">Maître assistant B</option>
                            <option value="Maître de conférence A">Maître de conférence A</option>
                            <option  value="Maître de conférence B">Maître de conférence B</option>
                            <option  value="Professeur" >Professeur</option>
                        </select>     
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        Président *
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input name="organismePresident" type="text" class="form-control">
                        </div>
                        </td>

                    </tr>
  
                    <tr id="product0">
                        <td>
                        <div class="input-group mb-3">
                        <input name="nomDirecteur" type="text" class="form-control" >
                        </div>
                                                    
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input name="prenomDirecteur" type="text" class="form-control" >
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <select  name="GradeDirecteur" class="form-control">
                        <option  value="Maître assistant A" >Maître assistant A</option>
                        <option  value="Maître assistant B">Maître assistant B</option>
                        <option value="Maître de conférence A">Maître de conférence A</option>
                        <option  value="Maître de conférence B">Maître de conférence B</option>
                        <option  value="Professeur" >Professeur</option>

                        </select>     
                        </div>
                        </td>
                        <td>
                        <div name = "Directeur de thèse" class="input-group mb-3">
                            Directeur de thèse  *
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input name="organismeDirecteur" type="text" class="form-control" >
                        </div>
                        </td>

                    </tr>

                    <tr id="product0">
                        <td>
                        <div class="input-group mb-3">
                        <input name="nomCoDirecteur" type="text" class="form-control" >
                        </div>
                                                    
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input name="prenomCoDirecteur" type="text" class="form-control" >
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <select  name="GradeCoDirecteur" class="form-control">
                        <option  value="Maître assistant A" >Maître assistant A</option>
                        <option  value="Maître assistant B">Maître assistant B</option>
                        <option value="Maître de conférence A">Maître de conférence A</option>
                        <option  value="Maître de conférence B">Maître de conférence B</option>
                        <option  value="Professeur" >Professeur</option>

                        </select>     
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                            Co-directeur de thèse *
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input name="organismeCoDirecteur" type="text" class="form-control" >
                        </div>
                        <div class="card">
                 </td>
</tr>

                    <tr id="product1"></tr>

                </tbody>
            </table>
                        <div class="card ">
            <div class="card-header">
            <h5>Examinateurs</h5> 
            </div>
            <table class="table" id="examinateurs_table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Grade</th>
                                    <th>Qualité</th>
                                    <th>Organisme</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="examinateur0">
                                    <td>
                                    <div class="input-group mb-3">
                                    <input name="nomExaminateur[]" type="text" class="form-control"  >
                                    </div>
                                                                
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input name="prenomExaminateur[]" type="text" class="form-control" >
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <select name="gradeExaminateur[]" class="form-control">
                                    <option  value="Maître assistant A" >Maître assistant A</option>
                                    <option  value="Maître assistant B">Maître assistant B</option>
                                    <option value="Maître de conférence A">Maître de conférence A</option>
                                    <option  value="Maître de conférence B">Maître de conférence B</option>
                                    <option  value="Professeur" >Professeur</option>

                                    </select>     
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    Examinateur *
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input name="organismeExaminateur[]" type="text" class="form-control" >
                                    </div>
                                    </td>

                                </tr>
            
                                <tr id="examinateur1">
                                <td>
                                    <div class="input-group mb-3">
                                    <input name="nomExaminateur[]" type="text" class="form-control" >
                                    </div>
                                                                
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input name="prenomExaminateur[]" type="text" class="form-control">
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <select name="gradeExaminateur[]" class="form-control">
                                    <option  value="Maître assistant A" >Maître assistant A</option>
                                    <option  value="Maître assistant B">Maître assistant B</option>
                                    <option value="Maître de conférence A">Maître de conférence A</option>
                                    <option  value="Maître de conférence B">Maître de conférence B</option>
                                    <option  value="Professeur" >Professeur</option>

                                    </select>     
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    Examinateur *
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input name="organismeExaminateur[]" type="text" class="form-control" >
                                    </div>
                                    </td>

                                </tr>

            

                                <tr id="examinateur2"></tr>

                            </tbody>

                        </table>
                                                    
            <div class="row">
                <div class="col-md-12">
                    <button  style="margin:10px;"  id="add_row" class="btn btn-primary pull-left">+ Ajouter un examinateur </button>
                    <button   style="margin:10px;"  id='delete_row' class="pull-right btn btn-danger">- Supprimer un examinateur </button>
                </div>
            </div>
            </div>

            </table>
                        <div class="card">
            <h5 class="card-header">Invités</h5>
            <table class="table" id="invites_table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Grade</th>
                                    <th>Qualité</th>
                                    <th>Organisme</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="invite0">
                                    <td>
                                    <div class="input-group mb-3">
                                    <input name="nomInvite[]" type="text" class="form-control"  >
                                    </div>
                                                                
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input name="prenomInvite[]" type="text" class="form-control" >
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <select  name="gradeInvite[]" class="form-control">
                                    <option  value="Maître assistant A" >Maître assistant A</option>
                                    <option  value="Maître assistant B">Maître assistant B</option>
                                    <option value="Maître de conférence A">Maître de conférence A</option>
                                    <option  value="Maître de conférence B">Maître de conférence B</option>
                                    <option  value="Professeur" >Professeur</option>

                                    </select>     
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    Invité
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input name="organismeInvite[]" type="text" class="form-control" >
                                    </div>
                                    </td>

                                </tr>

                                <tr id="invite1"></tr>

                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <button style="margin:10px;"  id="add_com" class="btn btn-primary pull-left">+ Ajouter un invite </button>
                    <button style="margin:10px;"  id='delete_com' class="pull-right btn btn-danger">- Supprimer un invite </button>
                </div>
            </div>
            </div>
            
            </div>
    </div>
    </div>
        <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
            Upload rapport soutenance
        </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="mb-3">
            <input type="file" accept="application/pdf" class="form-control" style="margin-top:20px;" name="rapport" >
            </div>

        </div>

    </div>

                <div class="d-grid gap-2">
                <button style="margin-top:30px;" class="btn btn-outline-success" type="submit">Enregistrer</button>
                </div>
  </form>

  

<script>
$(document).ready(function(){
    let row_number = 2;
        $("#add_row").click(function(e){
        e.preventDefault();
        if(row_number < 4)
        {
            let new_row_number = row_number - 1;
            $('#examinateur' + row_number).html($('#examinateur' + new_row_number).html()).find('td:first-child');
            $('#examinateurs_table').append('<tr id="examinateur' + (row_number + 1) + '"></tr>');
            row_number++;
        }
     
    });
   

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 2){
        $("#examinateur" + (row_number - 1)).html('');
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
      if(row_number < 2)
      {
        let new_row_number = row_number - 1;
        $('#invite' + row_number).html($('#invite' + new_row_number).html()).find('td:first-child');
        $('#invites_table').append('<tr id="invite' + (row_number + 1) + '"></tr>');
        row_number++;

      }

    });

    $("#delete_com").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#invite" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>
@endsection
