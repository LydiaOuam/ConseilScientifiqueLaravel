@extends('Requetes.directeurThese')

@section('contenu')
<form  method="POST" action="{{route('saveCSD')}}" enctype="multipart/form-data"style="margin-top:40px ;padding:10px 70px;border-style: solid;border-color: white;border-width: 2px;padding: 5px;width: 80%;margin-left: 10%;">
  @csrf

    </div>
  </div>
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
                        <input type="text" class="form-control" placeholder="Nom" >
                        </div>
                                                    
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Prénom">
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <select  name="searchGrade" class="form-control">
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
                        <input type="text" class="form-control">
                        </div>
                        </td>

                    </tr>
  
                    <tr id="product0">
                        <td>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nom" >
                        </div>
                                                    
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Prénom">
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <select  name="searchGrade" class="form-control">
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
                            Directeur de thèse  *
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" >
                        </div>
                        </td>

                    </tr>

                    <tr id="product0">
                        <td>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nom" >
                        </div>
                                                    
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Prénom">
                        </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                        <select  name="searchGrade" class="form-control">
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
                        <input type="text" class="form-control" >
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
                                    <input type="text" class="form-control" placeholder="Nom" >
                                    </div>
                                                                
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Prénom">
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <select  name="searchGrade" class="form-control">
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
                                    <input type="text" class="form-control" >
                                    </div>
                                    </td>

                                </tr>
            
                                <tr id="examinateur1">
                                    <td>
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nom" >
                                    </div>
                                                                
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Prénom">
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <select  name="searchGrade" class="form-control">
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
                                    <input type="text" class="form-control" >
                                    </div>
                                    </td>

                                </tr>

            

                                <tr id="examinateur2"></tr>

                            </tbody>

                        </table>
                                                    
            <div class="row">
                <div class="col-md-12">
                    <button id="add_row" class="btn btn-primary pull-left">+ Ajouter un examinateur </button>
                    <button id='delete_row' class="pull-right btn btn-danger">- Supprimer un examinateur </button>
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
                                    <input type="text" class="form-control" placeholder="Nom" >
                                    </div>
                                                                
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Prénom">
                                    </div>
                                    </td>
                                    <td>
                                    <div class="input-group mb-3">
                                    <select  name="searchGrade" class="form-control">
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
                                    <input type="text" class="form-control" >
                                    </div>
                                    </td>

                                </tr>

                                <tr id="invite1"></tr>

                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <button id="add_com" class="btn btn-primary pull-left">+ Ajouter un invite </button>
                    <button id='delete_com' class="pull-right btn btn-danger">- Supprimer un invite </button>
                </div>
            </div>
</div>

        </div>
    </div>
    <div>
    </div>
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
