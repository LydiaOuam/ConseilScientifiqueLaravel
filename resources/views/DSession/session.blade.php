@extends('DSession.accueil')

  @section('titre')
        Traitement des requêtes
    @endsection


@section('scontent')
<form style=" margin-left:30px;margin-right:30px;margin-top:50px;">
    <div class="accordion" id="accordionPanelsStayOpenExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">

          Voir les détails d'une requête
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show " aria-labelledby="panelsStayOpen-headingOne">
          <div class="accordion-body">
          @foreach($requetes as $requete)
            
           @php  $champs = explode(' ',$requete->observation)@endphp
            @if($requete->type == 1)
              @foreach($types as $type)
                @if($type->id == 1)
                  Requete : {{$type->nom}}<br>
                  Intitulé de la thèse :  {{$champs[1]}} <br>
                  Nom et Prénom : {{$champs[0]}} <br>
                  Département : {{$champs[2]}}<br>
                  Nom et Prénom de directeur : {{$champs[3]}}<br>
                  Observation eventuelles : {{$champs[4]}}<br>
                @endif
                @endforeach
            @endif

          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
          Voir les fichiers
          </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
        <div>{{$requete->idRequete}}
              @foreach($items as $item)
              {{$item->idRequete}}<br>
                {{$item->fichier}}<br>
               <iframe src="/upload/{{$item->fichier}}" frameborder="0"></iframe>
                @if($item->idRequete == $requete->idRequete)
                
                @endif
              @endforeach
        </div>
        </div>
        
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
          Donner une décision
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
        <div style="margin-top:20px;">
        <h6   style="margin-top:20px;margin-left:20px;"> Donner un avis</h6>
            <select class="form-select" aria-label="Default select example"  style="margin-top:20px;margin-left:20px;width:50%;">
                <option value="1">Favorable</option>
                <option value="2">Défavorable</option>
                <option value="3">Différé</option>
                <option value="3">Réserves</option>

            </select>
        </div >
          <h6   style="margin-top:20px;margin-left:20px;"> Donner une observation</h6>
          <div class="accordion-body" id="editor"></div>
          <button type="button" class="btn btn-success"  style="margin-top:20px;margin-left:20px;margin-bottom:20px;">Valider</button>
        </div>
        
      </div>

    </div>
    @endforeach    
  
</form>
{{$requetes->links()}}

<!-- ------------------------ -->




<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
</body>

