<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PV</title>
   
</head>

<body>

   <a href="{{route('downdecision')}}"><img src="imageLogo/telech.png" alt="Logo usthb"></a> 
    <div class="tete">
    République Algérienne Démocratique et Populaire <br>
    Ministère de l’Enseignement Supérieur et de la Recherche Scientifique <br>
    Université des Sciences et Technologie-Houari Boumediene <br>
    Faculté d’Electronique et Informatique
    <hr>
    Procès-Verbal du 
    Comité Scientifique de Département
    </div>
    <div class="departement">
            Département 
            @foreach($chef_departement as $chef)
            {{  $chef->dname}}
            @endforeach
    </div>
    <h6>Données de la session</h6>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Numéro de la session</th>
            <th scope="col">Date de la session</th>
            <th scope="col" >Nature de la session</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            @foreach($session_csd as $session)
                <td>{{$session->idSessionCSD}}</td>
                <td>{{$session->dateSession}}</td>
                <td>{{$session->typeSession}}</td>
            @endforeach


            </tr>
        </tbody>
    </table>
    <p>
            <h6> Référence aux textes réglementaires</h6>

       <p>1- Décret exécutif n°3-279 du 23 août 2003 fixant les missions et les règles particulières d’organisation et de fonctionnement de l’université.</p> 
        <p> 2-	L’arrêté du 05 Mai 2004 fixant les modalités de fonctionnement du comité scientifique du département.</p> 
        <p> 3-	L’arrêté n°230 en date du 10 Mars 2020 portant la liste nominative des membres du comité scientifique du département informatique</p> 
        <p> 4-	Instruction du secrétaire général n°1500 du 25 décembre 2019</p> 
</p>

<div class="principale">I.Liste des membres présents à la session du comité scientifique du département (1)</div> 
<h6>
1- Membres du comité scientifique du département
</h6>

<table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">N°</th>
            <th scope="col">Nom et Prénom</th>
            <th scope="col">Qualité</th>
            <th scope="col">Emargement</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 1 @endphp
        @foreach($presence as $pre)
            @if($pre->etatp == "Présent")
            <tr>
                <td>{{$i++}}</td>
                <td>{{$pre->name}}  {{$pre->fname}} </td>
                <td>{{$pre->TeachGrade}} </td>
                <td></td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <p>(1)Suivant l’arrêté n°230 en date du 10 Mars 2020 portant la liste nominative des membres du comité scientifique du département Informatique</p> 
   <h6>2- Membres du comité scientifique du département absents :</h6> 
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">N°</th>
            <th scope="col">Nom et Prénom</th>
            <th scope="col">Qualité</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
            @foreach($presence as $pre)
                @if($pre->etatp == "Absent" || $pre->etatp == "Absence justifiée")
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$pre->name}}  {{$pre->fname}} </td>
                    <td>{{$pre->TeachGrade}} </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

   <div class="principale">II.Ordre du jour de la session du comité scientifique du département </div> 

   <ul>
   <h2 class="titre"> Pédagogie </h2>


    @foreach($array_unique_points as $point)
        @if($point == 'Soumettre une nouvelle offre de formation')
        <li>{{$point}}</li>
        @endif
    @endforeach
    <h2  class="titre">Formation Doctorale</h2> 

    @foreach($array_unique_points as $point)

        @if($point == 'Abandonner thèse' || $point == 'Changer thème de la thèse' || $point == 'Soumettre dossier soutenance' 
                            || $point == 'Changer directeur de thèse' || $point == 'Changer directeur de thèse'
                            || $point == "S'inscrire en première année" || $point == "Geler l'inscription"
                            || $point == 'Rajouter un co-directeur' || $point == 'Se réinscrire' )
        <li>{{$point}}</li>
        @endif
        @endforeach
    <h2  class="titre">Recherche</h2> 
    
    @foreach($array_unique_points as $point)

        @if($point == 'Soumettre un nouveau projet de recherche' || $point == 'Soumettre un rapport de recherche individuel')
        <li>{{$point}}</li>
        @endif
        @endforeach

        <h2  class="titre">Académie</h2> 
    
    @foreach($array_unique_points as $point)

        @if($point == 'Soumettre dossier habilitation' || $point == "Demande d'une promotion pédagogique"
                    || $point == 'Demander une titularisation' || $point == 'Demander une mutation inter universitaire'
                    || $point == 'Demander une suspension de la relation de travail ' || $point == "Demande d'une promotion pédagogique")
        <li>{{$point}}</li>
        @endif
        @endforeach

    <h2  class="titre">Formation à l’étranger</h2> 
    @foreach($array_unique_points as $point)

        @if($point == 'Demander un séjour scientifique' || $point == "Demander une année sabbatique")
        <li>{{$point}}</li>
        @endif
        @endforeach

        <h2 class="titre"> Divers </h2>
        @foreach($array_unique_points as $point)

        @if($point != 'Demander un séjour scientifique' && $point != "Demander une année sabbatique" && $point != 'Soumettre dossier habilitation' && $point != "Demande d'une promotion pédagogique"
                    && $point != 'Demander une titularisation' && $point != 'Demander une mutation inter universitaire'
                    && $point != 'Demander une suspension de la relation de travail ' && $point != "Demande d'une promotion pédagogique"
                    && $point != 'Soumettre un nouveau projet de recherche' && $point != 'Soumettre un rapport de recherche individuel'
                    && $point != 'Abandonner thèse' && $point != 'Changer thème de la thèse' && $point != 'Soumettre dossier soutenance' 
                    && $point != 'Changer directeur de thèse' && $point != 'Changer directeur de thèse'
                    && $point != "S'inscrire en première année" && $point != "Geler l'inscription"
                    && $point != 'Rajouter un co-directeur' && $point != 'Se réinscrire'
                    && $point != 'Soumettre une nouvelle offre de formation')
        <li>{{$point}}</li>
        @endif
        @endforeach

   </ul>
  <div class="principale">III.Déroulement des travaux du comité scientifique du département</div> 
@foreach($requetes as $requete)
            @if($requete->type == 1)
              @foreach($types as $type)
                @if($type->id == $requete->type)
                  @foreach($details as $detail)
                        @if($detail->idRequete == $requete->idRequete)
                        <div class="information">
                           <h2 class="titre">{{$type->nom}}</h2> 
                          Nom et Prénom : {{$requete->name}} {{$requete->fname}}   <br>
                          Département : {{$requete->dname}} <br>
                          Nom et Prénom de directeur :  {{$detail->nomPrenomDirecteur}}<br>

                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                          </div>
                        @endif
                    @endforeach
                @endif
              @endforeach
              

                
              @elseif($requete->type == 2)
              @foreach($types as $type)
                @if($type->id == $requete->type)
                    @foreach($details as $detail)
                            @if($detail->idRequete == $requete->idRequete)
                            <div class="information">
                            <h2 class="titre">{{$type->nom}}</h2> 
                              Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                              Pays de destination :  {{$detail->paysDestination}}<br>
                              Etablissement d'accueil :{{$detail->etablissementaAccueil}}  <br>
                              Date début  de séjour : {{$detail->dateDeb}} <br>
                              Date fin de séjour : {{$detail->dateFin}} <br>
                              Responasable de stage : {{$detail->nomPrenomDirecteur}} <br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                              </div>
                            <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                            @endif
                        @endforeach
                  @endif
                @endforeach

                @elseif($requete->type == 3)
                  @foreach($types as $type)
                    @if($type->id == $requete->type)
                      @foreach($details as $detail)
                              @if($detail->idRequete == $requete->idRequete)
                              <div  class="information">
                              <h2 class="titre">{{$type->nom}}</h2> 
                                Nom et Prénom :{{$requete->name}} {{$requete->fname}}  <br>
                                Intitulé du sujet de thèse initiale :  {{$detail->intituleDesign}}<br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation :@if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                </div>
                              @endif
                          @endforeach
                    @endif
                  @endforeach
                     

                  @elseif($requete->type == 4)
                  @foreach($types as $type)
                    @if($type->id == $requete->type)
                      @foreach($details as $detail)
                                @if($detail->idRequete == $requete->idRequete)
                                <div  class="information">
                                <h2 class="titre">{{$type->nom}}</h2> 
                                  Type du Doctorat : {{$detail->typeDoctorat}} <br>
                                  Nom et Prénom : {{$requete->name}} {{$requete->fname}}<br>
                                  Directeur de thèse :  {{$detail->nomPrenomDirecteur}}  <br>
                                  Année de la première inscription:   {{$detail->annee}}<br>
                                  Département:  {{$requete->dname}}<br>
                                  Intitulé de la thèse:  {{$detail->intituleDesign}}<br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                  </div>
                                @endif
                            @endforeach
                      @endif
                    @endforeach

                    @elseif($requete->type == 5)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                            @foreach($details as $detail)
                                    @if($detail->idRequete == $requete->idRequete)
                                    <div  class="information">
                                    <h2 class="titre">{{$type->nom}}</h2> 
                                      Nom et Prénom :  {{$requete->name}} {{$requete->fname}} <br>
                                      Nom et Prénom de directeur de thèse actuel :  {{$detail->	nomPrenomDirecteur}}  <br>
                                      Nom et Prénom de directeur : {{$detail->nomPrenomResSecondaire}}<br>
                                      Motif : {{$detail->observation}}<br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                      </div>
                                    @endif
                                @endforeach
                          @endif
                        @endforeach
                        

                    @elseif($requete->type == 7 || $requete->type == 10 )
                      @foreach($types as $type)
                        @if($type->id == $requete->type)
                        
                            @foreach($details as $detail)
                                        @if($detail->idRequete == $requete->idRequete)
                                        <div  class="information">
                                        <h2 class="titre">{{$type->nom}}</h2> 
                                          Type du Doctorat : {{$detail->typeDoctorat}} <br>
                                          Département:   {{$requete->dname}}<br>
                                          Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                                          Nom et Prénom du directeur :  {{$detail->nomPrenomDirecteur}} <br>
                                          Nom et Prénom du co-directeur :   {{$detail->	nomPrenomResSecondaire}}<br>
                                          Intitulé de la thèse : {{$detail->intituleDesign}}<br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                        </div>
                                        @endif
                                    @endforeach
                              @endif
                            @endforeach
                     

                    @elseif($requete->type == 8)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                        @if($detail->idRequete == $requete->idRequete)
                                        <div  class="information">
                                        <h2 class="titre">{{$type->nom}}</h2> 
                                          Nom et Prénom :  {{$requete->name}} {{$requete->fname}}<br>
                                          Motif : {{$detail->observation}} <br>
                        <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif/h4>
                                          </div>
                                        @endif
                                    @endforeach
                              @endif
                            @endforeach
                          

                    @elseif($requete->type == 9)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                          @foreach($details as $detail)
                                          @if($detail->idRequete == $requete->idRequete)
                                          <div  class="information">
                                          <h2 class="titre">{{$type->nom}}</h2> 
                                            Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                                            Nom et Prénom du co-directeur : {{$detail->nomPrenomResSecondaire}}<br>
                                            Motif : {{$detail->observation}} <br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                            </div>
                                          @endif
                                      @endforeach
                                @endif
                              @endforeach
                        
                       

                    @elseif($requete->type == 11 || $requete->type == 12 )
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        
                            @foreach($details as $detail)
                                              @if($detail->idRequete == $requete->idRequete)
                                              <div  class="information">
                                              <h2 class="titre">{{$type->nom}}</h2> 
                                                Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                                                Grade actuel : {{$detail->gradeActuel}} <br>
                                                Promotion : {{$detail->promotion}}<br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                                </div>
                                              @endif
                                          @endforeach
                                    @endif
                                  @endforeach
                          
                    @elseif($requete->type == 13)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                            @foreach($details as $detail)
                                                  @if($detail->idRequete == $requete->idRequete)
                                                  <div  class="information">
                                                  <h2 class="titre">{{$type->nom}}</h2> 
                                                    Nom et Prénom :  {{$requete->name}} {{$requete->fname}} <br>
                                                    Département:  {{$requete->dname}} <br>
                                                    Observations : {{$detail->	observation}}<br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                                    </div>
                                                  @endif
                                              @endforeach
                                        @endif
                                      @endforeach
                      

                    @elseif($requete->type == 14||$requete->type == 20||$requete->type == 23||$requete->type == 18||$requete->type == 21||$requete->type == 24||$requete->type == 22)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                            @foreach($details as $detail)
                                                      @if($detail->idRequete == $requete->idRequete)
                                                      <div  class="information">
                                                      <h2 class="titre">{{$type->nom}}</h2> 
                                                        Nom et Prénom : {{$requete->name}} {{$requete->fname}} <br>
                                                        Observations : {{$detail->	observation}}<br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                                        </div>
                                                      @endif
                                                  @endforeach
                                            @endif
                                          @endforeach
                       
                    @elseif($requete->type == 15)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                                      @if($detail->idRequete == $requete->idRequete)
                                                      <div  class="information">
                                                      <h2 class="titre">{{$type->nom}}</h2> 
                                                        Nom et Prénom :  {{$requete->name}} {{$requete->fname}} <br>
                                                        Pays de detisnation :  {{$detail->paysDestination}}  <br>
                                                        Date début de séjour: {{$detail->dateDeb}}  <br>
                                                        Date fin de séjour: {{$detail->dateFin}}  <br>
                                                        Etablissement d'accueil : {{$detail->etablissementaAccueil}} <br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation :@if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                                        </div>
                                                      @endif
                                                  @endforeach
                                            @endif
                                          @endforeach
                  
                    @elseif($requete->type == 16)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                                      @if($detail->idRequete == $requete->idRequete)
                                                      <div  class="information">
                                                      <h2 class="titre">{{$type->nom}}</h2> 
                                                        Chef du projet :  {{$requete->name}} {{$requete->fname}} <br>
                                                        Intitulé du projet : {{$detail->intituleDesign}}  <br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                                        </div>
                                                      @endif
                                                  @endforeach
                                            @endif
                                          @endforeach
                          
                    @elseif($requete->type == 17)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                                        @if($detail->idRequete == $requete->idRequete)
                                                        <div  class="information">
                                                          <h2 class="titre">{{$type->nom}}</h2> 
                                                          Nom et Prénom :   {{$requete->name}} {{$requete->fname}} <br>
                                                          Niveau :  {{$detail->diplomeAcc}}<br>
                                                          Désignation :{{$detail->intituleDesign}} <br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                                          </div>
                                                        @endif
                                                    @endforeach
                                              @endif
                                            @endforeach  
                    

                    @elseif($requete->type == 19)
                      @foreach($types as $type)
                        @if($type->id == $requete->type)

                        @foreach($details as $detail)
                                                        @if($detail->idRequete == $requete->idRequete)
                                                        <div  class="information">
                                                        <h2 class="titre">{{$type->nom}}</h2> 
                                                          Nom et Prénom :   {{$requete->name}} {{$requete->fname}} <br>
                                                          Etablissement d’accueil : {{$detail->etablissementaAccueil}}  <br>
                          <h4 class="decision">Décision : <span> {{$requete->avis}}</span></h4>
                          <h4>Observation : @if($requete->observation == '') / @else {{$requete->observation}} @endif</h4>
                                                          </div>
                                                        @endif
                                                    @endforeach
                                              @endif
                                            @endforeach  
                        
            @endif
           
        @endforeach

<div class="sec"> Le secrétaire de la  session    <br>                                      
Nom, Prénom  et signature   </div>
<br>
<div class="pre">Président du CSD <br>
Nom, Prénom et Signature</div>
</body>
</html>

<style>
 * {  
 font-size:small;}
body{
    margin:15px;
    border: 2px solid black;
    padding:15px;
    padding-bottom:100px;
}
img{
    float:left;
    width:10%;
}
.tete{
    width:80%;
    margin:50px;
    text-align: center;
    font-size:17px;
    font-weight: bold;

}
table {
 border-collapse:collapse;
 width:90%;
 }
th, td {
 border:1px solid black;
 width:20%;
 }
td {
 text-align:center;
 height:40px;
 }

.departement{
    text-align:center;
    font-size:18px;
    font-weight: bold;

}
.titre{
    background-color: #ef813a;
    color: black;
    width:500px;
    font-size:18px;
    border-radius:3px;
   
}
li{
    margin-left:40px;
    font-size:15px;
}

.principale{
    font-size:20px;
    font-weight:bold;
    
}
.information{
    font-size:15px;
    font-weight:bold;
    margin-left:20px;
}
.decision{
    color:blue;
    font-size:15px;

}
span{
    color:black;

}
h4{
    margin-left:30px;
}
.sec{
    font-size:14px;
    font-weight:bold;
    float:left;
    padding-bottom:40px;
}
.pre{
    font-size:14px;
    font-weight:bold;
    float:right;
    padding-bottom:40px;

}



</style>
