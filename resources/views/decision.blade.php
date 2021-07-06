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
    République Algérienne Démocratique et Populaire
    Ministère de l’Enseignement Supérieur et de la Recherche Scientifique
    Université des Sciences et Technologie-Houari Boumediene
    Faculté d’Electronique et Informatique
    <hr>
    Procès-Verbal du 
    Comité Scientifique de Département
    </div>
    Département 
    ici j insere le departement concerne

    Données de la session
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Numéro de la session</th>
            <th scope="col">Date de la session</th>
            <th colspan="2" >Nature de la session</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <th>Normale</th>
                <th>Extraordinaire</th>

            </tr>
        </tbody>
    </table>
    Référence aux textes réglementaires

1-	Décret exécutif n°3-279 du 23 août 2003 fixant les missions et les règles particulières d’organisation et de fonctionnement de l’université.
2-	L’arrêté du 05 Mai 2004 fixant les modalités de fonctionnement du comité scientifique du département.
3-	L’arrêté n°230 en date du 10 Mars 2020 portant la liste nominative des membres du comité scientifique du département informatique
4-	Instruction du secrétaire général n°1500 du 25 décembre 2019
<br>
I.Liste des membres présents à la session du comité scientifique du département (1)
<br>
1- Membres du comité scientifique du département
<br>
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    (1)Suivant l’arrêté n°230 en date du 10 Mars 2020 portant la liste nominative des membres du comité scientifique du département Informatique
    <br>
    2- Membres du comité scientifique du département absents :
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">N°</th>
            <th scope="col">Nom et Prénom</th>
            <th scope="col">Qualité</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    II.Ordre du jour de la session du comité scientifique du département


Thème principal


Pédagogie
Habilitation d’une formation cycle Licence
Habilitation d’une formation cycle Master

Formation Doctorale
Habilitation des PG., PGS, Ecole Doctorale et Doctorat 3ème cycle (LMD)
Première inscription en mémoire de Magister
Proposition de sujet de mémoire de Magister ou thèse de Doctorat
Réinscription en mémoire de Magister et thèse de Doctorat
Changement de Directeur de mémoire de Magister ou thèse de Doctorat
Changement de sujet de mémoire de Magister ou de thèse de Doctorat
Réintégration en mémoire de Magister ou de thèse de Doctorat
Soutenance de mémoire de Magister ou de thèse de Doctorat
Requête particulière

Recherche
Projet de convention et de collaboration
Examen des rapports de recherche
Projet de recherche CNEPRU (Nouveau, Reconduction, Clôture)
Demande d’intégration dans un projet de recherche
Promotion scientifique
Proposition de création de laboratoire de recherche
Proposition de manifestations scientifiques

Académie
Promotion académique
Habilitation universitaire
Titularisation
Détachement
Mutation intra ou inter-université
Mise en disponibilité

Formation à l’étranger
Rencontre internationale
Séjour scientifique

Divers 



    <h1>Ordre du Jour</h1>
    une list

    <hr>
    Une liste de toute les requetes
    <ul>
    @foreach($dec as $de)
    <li>{{$de->idDecision}}</li>
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
    text-align: center 
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

</style>
