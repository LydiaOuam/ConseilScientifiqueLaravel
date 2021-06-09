@extends('Requetes.accreq')

@section('contenu')

<div class="mb-3" style="margin-top:30px;margin-left:30px; margin-right:30px;">
<h5>Choisir le type de la requête à soumettre</h5>
                 <input list="types" name="typereq" id="typereq"  class="form-control" >
                <datalist id="types">
                    <option value="Abandonner thèse">Abandonner thèse</option>
                    <option value="Demander un séjour scientifique">Demander un séjour scientifique</option>
                    <option value="Changer thème de la thèse">Changer thème de la thèse</option>
                    <option value="Soumettre dossier soutenance">Soumettre dossier soutenance </option>
                    <option value="Changer directeur de thèse">Changer directeur de thèse</option>
                    <option value="Demande d'un congé scientifique">Demande d'un congé scientifique</option>
                    <option value="S'inscrire en première année">S'inscrire en première année</option>
                    <option value="Geler l'inscription">Geler l'inscription</option>
                    <option value="Rajouter un co-directeur">Rajouter un co-directeur</option>
                    <option value="Se réinscrire">Se réinscrire</option>

                </datalist>
                
            </div>
@endsection