@extends('DSession.accueil')

  @section('titre')
        Traitement des requêtes
    @endsection


@section('scontent')
<div style=" margin-left:30px;margin-right:30px;margin-top:50px;">
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
            
           @php  $champs = explode(' ',$requete->observation);
                $taille = count($champs) @endphp
            @if($requete->type == 1)
              @foreach($types as $type)
                @if($type->id == $requete->type)
                  Requete : {{$type->nom}}<br>
                  Nom et Prénom : {{$champs[0]}}  {{$champs[1]}} <br>
                  Département :  {{$champs[2]}} <br>
                  Nom et Prénom de directeur : {{$champs[3]}} {{$champs[4]}}<br>
                  Observation eventuelles : @for($i = 5;$i<$taille;$i++) {{$champs[$i]}}@endfor<br>
                @endif
                @endforeach
                
              @elseif($requete->type == 2)
              @foreach($types as $type)
                @if($type->id == $requete->type)
                  Requete : {{$type->nom}}<br>
                  Nom et Prénom : {{$champs[0]}} {{$champs[1]}}<br>
                  Pays de destination :  {{$champs[2]}} <br>
                  Etablissement d'accueil : {{$champs[3]}} <br>
                  Date début  de séjour : {{$champs[4]}}<br>
                  Date fin de séjour : {{$champs[5]}}<br>
                  Responasable de stage : {{$champs[6]}}<br>
                @endif
                @endforeach

                  @elseif($requete->type == 3)
                  @foreach($types as $type)
                    @if($type->id == $requete->type)
                      Requete : {{$type->nom}}<br>
                      Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                      Intitulé du sujet de thèse initiale : @for($i = 2;$i<$taille;$i++) {{$champs[$i]}}@endfor  <br>
                      @endif
                @endforeach

                  @elseif($requete->type == 4)
                  @foreach($types as $type)
                    @if($type->id == $requete->type)
                      Requete : {{$type->nom}}<br>
                      Type du Doctorat :{{$champs[0]}} <br>
                      Nom et Prénom : {{$champs[1]}} {{$champs[2]}} <br>
                      Directeur de thèse : {{$champs[3]}}  {{$champs[4]}}  <br>
                      Année de la première inscription:  {{$champs[5]}}<br>
                      Département: {{$champs[6]}}<br>
                      Intitulé de la thèse: @for($i = 7;$i<$taille;$i++) {{$champs[$i]}}@endfor<br>
                      @endif
                @endforeach
                    @elseif($requete->type == 5)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Nom et Prénom de directeur de thèse actuel : {{$champs[2]}}  {{$champs[3]}}  <br>
                          Nom et Prénom de directeur : {{$champs[4]}} {{$champs[5]}}<br>
                          Motif:@for($i = 6;$i<$taille;$i++) {{$champs[$i]}}@endfor<br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 7 || $requete->type == 10 )
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Type du Doctorat :{{$champs[0]}} <br>
                          Département: {{$champs[1]}}<br>
                          Nom et Prénom : {{$champs[2]}} {{$champs[3]}} <br>
                          Nom et Prénom du directeur : {{$champs[4]}}  {{$champs[5]}}  <br>
                          Nom et Prénom du co-directeur :  {{$champs[6]}} {{$champs[7]}}<br>
                          Diplôme d’accès :{{$champs[8]}}<br>
                          Intitulé de la thèse :@for($i = 9;$i<$taille;$i++) {{$champs[$i]}}@endfor<br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 8)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Motif:@for($i = 2;$i<$taille;$i++) {{$champs[$i]}}@endfor <br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 9)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Nom et Prénom du co-directeur :{{$champs[2]}} {{$champs[3]}}<br>
                          Motif:@for($i = 4;$i<$taille;$i++) {{$champs[$i]}}@endfor <br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 11 || $requete->type == 12 )
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Grade actuel : {{$champs[2]}} {{$champs[3]}} {{$champs[4]}} <br>
                          Promotion :@for($i = 5;$i<$taille;$i++) {{$champs[$i]}}@endfor<br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 13)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Département: {{$champs[2]}} <br>
                          Observations :@for($i = 2;$i<$taille;$i++) {{$champs[$i]}}@endfor<br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 14||$requete->type == 20||$requete->type == 23||$requete->type == 18||$requete->type == 21||$requete->type == 24||$requete->type == 22)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Observations :@for($i = 2;$i<$taille;$i++) {{$champs[$i]}}@endfor<br>
                          @endif
                    @endforeach
                    
                    @elseif($requete->type == 15)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Pays de detisnation : {{$champs[2]}} <br>
                          Date début de séjour: {{$champs[3]}} <br>
                          Date fin de séjour: {{$champs[4]}} <br>
                          Etablissement d'accueil :@for($i = 5;$i<$taille;$i++) {{$champs[$i]}}@endfor<br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 16)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Chef du projet: {{$champs[0]}} {{$champs[1]}} <br>
                          Intitulé du projet:@for($i = 2;$i<$taille;$i++) {{$champs[$i]}}@endfor <br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 17)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Niveau :  {{$champs[2]}}<br>
                         Désignation :@for($i = 3;$i<$taille;$i++) {{$champs[$i]}}@endfor <br>
                          @endif
                    @endforeach

                    @elseif($requete->type == 19)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                          Requete : {{$type->nom}}<br>
                          Nom et Prénom : {{$champs[0]}} {{$champs[1]}} <br>
                          Etablissement d’accueil : @for($i = 2;$i<$taille;$i++) {{$champs[$i]}}@endfor <br>
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
        <div>
              @foreach($items as $item)
              @if($item->idRequete == $requete->idRequete)
                <a target="_blank"  href="{{route('List',[$item->idItem])}}">{{$item->fichier}}</a><br> 
                @endif
              @endforeach
        </div>
        </div>
        
      </div>
 
<form action="{{route('deciderRequete',[$requete->idRequete])}}" method="POST" >
      @csrf    
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
          Donner une décision
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
        <div style="margin-top:20px;">
        <h6   style="margin-top:20px;margin-left:20px;"> Donner un avis</h6>
            <select class="form-select" aria-label="Default select example" name="decision"  style="margin-top:20px;margin-left:20px;width:50%;">
                <option value="1">Favorable</option>
                <option value="2">Défavorable</option>
                <option value="3">Différé</option>
                <option value="3">Réserves</option>

            </select>
        </div >
          <h6   style="margin-top:20px;margin-left:20px;"> Donner une observation</h6>
                    
            <div class="input-group input-group-sm mb-3">
              <textarea type="text" class="form-control" name="observation" style="margin-right:20px; margin-left:20px;"></textarea>
            </div>

          <button type="submit" class="btn btn-success"  style="margin-top:20px;margin-left:20px;margin-bottom:20px;">Valider</button>
        </div>
        
      </div>

    </div>
    @endforeach    
  
</form>
{{$requetes->links()}}
</div>
<!-- ------------------------ -->


@endsection
</body>

