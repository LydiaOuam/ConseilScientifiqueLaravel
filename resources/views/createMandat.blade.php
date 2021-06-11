@extends('base')
    @section('titre')
    Créer un mandat
    @endsection
    @section('contenu')
     <!-------------------------------Creer mandat----------------------------------->
     @section('action')
        {{route('Créer')}}
    @endsection

    


<form action="{{route('saveDates')}}" method="POST" style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: lightgray;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
@csrf
   <h2>Créer un mandat</h2>
    <fieldset style="padding:0 20px 20px 30px;
    margin-bottom:20px;
    border:1px solid lightgray;
    margin-top: 10px;">
        <legend>Dates</legend>
            <div class="mb-3">
            <label class="form-label">Date début</label>
            <input type="date" name="date_deb" class= "form-control" >
            </div>
            <div class="mb-3">
            <label class="form-label">Date fin</label>
            <input type="date" name="date_fin" class= "form-control" >
            </div>
    </fieldset>

    <fieldset style="padding:0 20px 20px 30px;
    margin-bottom:20px;
    border:1px solid lightgray;
    margin-top: 10px;">

<legend>Ajouter le président:</legend>
                     <div class="mb-3" style="margin-top:20px;">
                
                        <input list="membre" name="membre" class="form-control" style="width:500px;margin-left:20px;">
                        <datalist id="membre">
                        @foreach($comptes as $compte) 
                            <option value="{{$compte->id}}">{{$compte->name}} {{$compte->fname}}</option>
                            @endforeach 
                        </datalist>
                        
                    </div>
        
    </fieldset>
    <button type="submit" class="btn btn-success" style="width:800px;margin-left:30px;" >Suivant</button>

    <div class="mb-3" style="margin-top:20px;">




</form>   
    @endsection