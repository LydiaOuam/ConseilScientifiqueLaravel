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
    <h4 >Université des Sciences et de la Technologie Houari Boumediene</h4>
    <h4> Faculté d’Electronique et d’Informatique</h4>
    <h1>PV du Conseil Scientifique</h1>
    <h3>Séance du : </h3>
    </div>
<hr>
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
</style>
