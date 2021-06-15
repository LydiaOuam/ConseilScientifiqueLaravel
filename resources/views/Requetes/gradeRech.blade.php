@extends('Requetes.accreq')

@section('contenu')

<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Demande d'une promotion dans la recherche</h6>
<form  method="POST" action="{{route('SaveRech')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom : </span>
          <input type="text" class="form-control" name="Nom" value="{{old('Nom')}}" >
        </div>

        

        <label for="GradeActuel">Grade actuel:</label>

                <select  name="GradeActuel" class="form-control" >
                    <option  value="Attaché de recherche">Attaché de recherche</option>
                    <option  value="Chargé de recherche">Chargé de recherche</option>
                    <option  value="Maître de recherche ">Maître de recherche </option>
                </select>   

       <label for="Grade">Promotion :</label>

            <select  name="Grade" class="form-control" >
               
                <option  value="Chargé de recherche">Chargé de recherche</option>
                <option  value="Maître de recherche ">Maître de recherche </option>
                <option value="Directeur de recherche">Directeur de recherche</option>

            </select>


        <button type="submit" class="btn btn-success" style="margin-left:50px;margin-top:20px;">Soumettre</button>
   
</form>

@endsection