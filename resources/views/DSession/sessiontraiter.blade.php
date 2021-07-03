
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
            @if($requete->type == 1)
              @foreach($types as $type)
                @if($type->id == $requete->type)
                  @foreach($details as $detail)
                        @if($detail->idRequete == $requete->idRequete)
                          Requête : {{$type->nom}}<br>
                          Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                          Département : {{$requete->dname}} <br>
                          Nom et Prénom de directeur :  {{$detail->nomPrenomDirecteur}}<br>
                        @endif
                    @endforeach
                @endif
              @endforeach
              

                
              @elseif($requete->type == 2)
              @foreach($types as $type)
                @if($type->id == $requete->type)
                    @foreach($details as $detail)
                            @if($detail->idRequete == $requete->idRequete)
                              Requête : {{$type->nom}}<br>
                              Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                              Pays de destination :  {{$detail->paysDestination}}<br>
                              Etablissement d'accueil :{{$detail->etablissementaAccueil}}  <br>
                              Date début  de séjour : {{$detail->dateDeb}} <br>
                              Date fin de séjour : {{$detail->dateFin}} <br>
                              Responasable de stage : {{$detail->nomPrenomDirecteur}} <br>
                            @endif
                        @endforeach
                  @endif
                @endforeach

                @elseif($requete->type == 3)
                  @foreach($types as $type)
                    @if($type->id == $requete->type)
                      @foreach($details as $detail)
                              @if($detail->idRequete == $requete->idRequete)
                                Requête : {{$type->nom}}<br>
                                Nom et Prénom :{{$requete->name}} {{$requete->fname}}  <br>
                                Intitulé du sujet de thèse initiale :  {{$detail->intituleDesign}}<br>
                              @endif
                          @endforeach
                    @endif
                  @endforeach
                     

                  @elseif($requete->type == 4)
                  @foreach($types as $type)
                    @if($type->id == $requete->type)
                      @foreach($details as $detail)
                                @if($detail->idRequete == $requete->idRequete)
                                  Requête : {{$type->nom}}<br>
                                  Type du Doctorat : {{$detail->typeDoctorat}} <br>
                                  Nom et Prénom : {{$requete->name}} {{$requete->fname}}<br>
                                  Directeur de thèse :  {{$detail->nomPrenomDirecteur}}  <br>
                                  Année de la première inscription:   {{$detail->annee}}<br>
                                  Département:  {{$requete->dname}}<br>
                                  Intitulé de la thèse:  {{$detail->intituleDesign}}<br>
                                @endif
                            @endforeach
                      @endif
                    @endforeach

                    @elseif($requete->type == 5)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                            @foreach($details as $detail)
                                    @if($detail->idRequete == $requete->idRequete)
                                      Requête : {{$type->nom}}<br>
                                      Nom et Prénom :  {{$requete->name}} {{$requete->fname}} <br>
                                      Nom et Prénom de directeur de thèse actuel :  {{$detail->	nomPrenomDirecteur}}  <br>
                                      Nom et Prénom de directeur : {{$detail->nomPrenomResSecondaire}}<br>
                                      Motif : {{$detail->observation}}<br>
                                    @endif
                                @endforeach
                          @endif
                        @endforeach
                        

                    @elseif($requete->type == 7 || $requete->type == 10 )
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                        
                            @foreach($details as $detail)
                                        @if($detail->idRequete == $requete->idRequete)
                                          Requête : {{$type->nom}}<br>
                                          Type du Doctorat : {{$detail->typeDoctorat}} <br>
                                          Département:   {{$requete->dname}}<br>
                                          Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                                          Nom et Prénom du directeur :  {{$detail->nomPrenomDirecteur}} <br>
                                          Nom et Prénom du co-directeur :   {{$detail->	nomPrenomResSecondaire}}<br>
                                          Intitulé de la thèse : {{$detail->intituleDesign}}<br>
                                        @endif
                                    @endforeach
                              @endif
                            @endforeach
                     

                    @elseif($requete->type == 8)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                        @if($detail->idRequete == $requete->idRequete)
                                          Requête : {{$type->nom}}<br>
                                          Nom et Prénom :  {{$requete->name}} {{$requete->fname}}<br>
                                          Motif : {{$detail->observation}} <br>
                                        @endif
                                    @endforeach
                              @endif
                            @endforeach
                          

                    @elseif($requete->type == 9)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                          @foreach($details as $detail)
                                          @if($detail->idRequete == $requete->idRequete)
                                            Requête : {{$type->nom}}<br>
                                            Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                                            Nom et Prénom du co-directeur : {{$detail->nomPrenomResSecondaire}}<br>
                                            Motif : {{$detail->observation}} <br>
                                          @endif
                                      @endforeach
                                @endif
                              @endforeach
                        
                       

                    @elseif($requete->type == 11 || $requete->type == 12 )
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        
                            @foreach($details as $detail)
                                              @if($detail->idRequete == $requete->idRequete)
                                                Requête : {{$type->nom}}<br>
                                                Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                                                Grade actuel : {{$detail->gradeActuel}} <br>
                                                Promotion : {{$detail->promotion}}<br>
                                              @endif
                                          @endforeach
                                    @endif
                                  @endforeach
                          
                    @elseif($requete->type == 13)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                            @foreach($details as $detail)
                                                  @if($detail->idRequete == $requete->idRequete)
                                                    Requête : {{$type->nom}}<br>
                                                    Nom et Prénom :  {{$requete->name}} {{$requete->fname}} <br>
                                                    Département:  {{$requete->dname}} <br>
                                                    Observations : {{$detail->	observation}}<br>
                                                  @endif
                                              @endforeach
                                        @endif
                                      @endforeach
                      

                    @elseif($requete->type == 14||$requete->type == 20||$requete->type == 23||$requete->type == 18||$requete->type == 21||$requete->type == 24||$requete->type == 22)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                            @foreach($details as $detail)
                                                      @if($detail->idRequete == $requete->idRequete)
                                                        Requête : {{$type->nom}}<br>
                                                        Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                                                        Observations : {{$detail->	observation}}<br>
                                                      @endif
                                                  @endforeach
                                            @endif
                                          @endforeach
                       
                    @elseif($requete->type == 15)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                                      @if($detail->idRequete == $requete->idRequete)
                                                        Requête : {{$type->nom}}<br>
                                                        Nom et Prénom :  {{$requete->name}} {{$requete->fname}} <br>
                                                        Pays de detisnation :  {{$detail->paysDestination}}  <br>
                                                        Date début de séjour: {{$detail->dateDeb}}  <br>
                                                        Date fin de séjour: {{$detail->dateFin}}  <br>
                                                        Etablissement d'accueil : {{$detail->etablissementaAccueil}} <br>
                                                      @endif
                                                  @endforeach
                                            @endif
                                          @endforeach
                  
                    @elseif($requete->type == 16)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                                      @if($detail->idRequete == $requete->idRequete)
                                                        Requête : {{$type->nom}}<br>
                                                        Chef du projet :  {{$requete->name}} {{$requete->fname}} <br>
                                                        Intitulé du projet : {{$detail->intituleDesign}}  <br>

                                                      @endif
                                                  @endforeach
                                            @endif
                                          @endforeach
                          
                    @elseif($requete->type == 17)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                                        @if($detail->idRequete == $requete->idRequete)
                                                          Requête : {{$type->nom}}<br>
                                                          Nom et Prénom :   {{$requete->name}} {{$requete->fname}} <br>
                                                          Niveau :  {{$detail->diplomeAcc}}<br>
                                                          Désignation :{{$detail->intituleDesign}} <br>

                                                        @endif
                                                    @endforeach
                                              @endif
                                            @endforeach  
                    

                    @elseif($requete->type == 19)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                                        @if($detail->idRequete == $requete->idRequete)
                                                          Requête : {{$type->nom}}<br>
                                                          Nom et Prénom :   {{$requete->name}} {{$requete->fname}} <br>
                                                          Etablissement d’accueil : {{$detail->etablissementaAccueil}}  <br>
                                                        @endif
                                                    @endforeach
                                              @endif
                                            @endforeach  
                        
            @endif

                

          </div>
        </div>
      </div>

        @if($requete->type == 4)
          <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
              Accordion Item #3
            </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>   
        @endif
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
                <option value="Favorable">Favorable</option>
                <option value="Défavorable">Défavorable</option>
                <option value="Différé">Différé</option>
                <option value="Réserves">Réserves</option>

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

