@extends('Requetes.accreq')

@section('contenu')


<h6 style="margin-top=20px; margin-top:40px ;padding:10px 70px;padding: 5px;width: 70%;margin-left: 15%;">Demande d'une promotion pédagogique</h6>
<form  method="POST" action="{{route('SaveProm')}}" enctype="multipart/form-data" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf

        <div class="input-group input-group-sm mb-3" >
        <span  style="margin-right:20px;">Nom et Prénom : </span>
          <input type="text" class="form-control" name="Nom" value="{{old('Nom')}}" >
        </div>

        

        <label for="searchGrade">Grade actuel:</label>
                <select  name="GradeActuel" class="form-control" >
                    <option  value="Maître assistant B">Maître assistant B</option>
                </select> 
                
        <label for="searchGrade">Promotion: </label>
                <select  name="Grade" class="form-control" >
                    <option  value="Maître assistant A">Maître assistant A</option>
                    <option  value="Maître de conférence B">Maître de conférence B</option>
                    
                </select> 
 


        <button type="submit" class="btn btn-success" style="margin-left:50px;margin-top:20px;">Soumettre</button>

     
     
</form>

@endsection