<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PV</title>
   
</head>
<body>
    <img src="imageLogo/telech.png" alt="Logo usthb">
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
<br>
<h6>
I.Liste des membres présents à la session du comité scientifique du département (1)</h6>
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
    <br>
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

   <div class="departement"><h6>II.Ordre du jour de la session du comité scientifique du département </h6> </div> 

   <ul>
   Pédagogie


    @foreach($array_unique_points as $point)
        @if($point == 'Soumettre une nouvelle offre de formation')
        <li>{{$point}}</li>
        @endif
    @endforeach
    <br>
    Formation Doctorale

    @foreach($array_unique_points as $point)

        @if($point == 'Abandonner thèse' || $point == 'Changer thème de la thèse' || $point == 'Soumettre dossier soutenance' 
                            || $point == 'Changer directeur de thèse' || $point == 'Changer directeur de thèse'
                            || $point == "S'inscrire en première année" || $point == "Geler l'inscription"
                            || $point == 'Rajouter un co-directeur' || $point == 'Se réinscrire' )
        <li>{{$point}}</li>
        @endif
        @endforeach
    <br>
    Recherche
    
    @foreach($array_unique_points as $point)

        @if($point == 'Soumettre un nouveau projet de recherche' || $point == 'Soumettre un rapport de recherche individuel')
        <li>{{$point}}</li>
        @endif
        @endforeach

        Académie
    
    @foreach($array_unique_points as $point)

        @if($point == 'Soumettre dossier habilitation' || $point == "Demande d'une promotion pédagogique"
                    || $point == 'Demander une titularisation' || $point == 'Demander une mutation inter universitaire'
                    || $point == 'Demander une suspension de la relation de travail ' || $point == "Demande d'une promotion pédagogique")
        <li>{{$point}}</li>
        @endif
        @endforeach

    <br>
    Formation à l’étranger
    @foreach($array_unique_points as $point)

        @if($point == 'Demander un séjour scientifique' || $point == "Demander une année sabbatique")
        <li>{{$point}}</li>
        @endif
        @endforeach

        <br>
        Divers 
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



</body>
</html>

<style>
 * {  
 font-size:small;}
body{
    margin:15px;
    border: 2px solid black;
    padding:15px;
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
 }

.departement{

    text-align:center;
    font-size:14px;
}

</style>
