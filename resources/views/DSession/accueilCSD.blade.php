@extends('DSession.accueil')
    @section('titre')
       Accueil CSD
    @endsection

@section('scontent')
@if(count($session_csd) == 0)

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Aucune session n'est planifiée pour ce jour
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@endif
        <form action="{{route('enregistrerEtat')}}" method="POST" >
            @csrf
                    <div class="modal fade modal-dialog-scrollable"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content ">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Présence</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Etat présence</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 0 @endphp
                            @foreach($users as $user)

                            <tr>

                                <td>{{$user->name}}</td>
                                <td>{{$user->fname}}</td>
                                <td>
                                <div>
                                    <input style="margin:10px;" class="form-check-input" type="radio" name="etat{{$i}}" value="Présent,{{$user->id}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Présent
                                    </label>
                                    <input style="margin:10px;" class="form-check-input" type="radio" name="etat{{$i}}" value="Absence justifiée,{{$user->id}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Absence justifiée
                                    </label>
                                    <input style="margin:10px;" class="form-check-input"  type="radio" name="etat{{$i}}"  value="Absent,{{$user->id}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Absent
                                    </label>
                                </div>
                                </td>
                                </tr>
                                @php $i++ @endphp
                            @endforeach

                            </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success" >Enregistrer</button>

                          </div>
 
                        </div>
                      </div>
                    </div>

    </form>
@section('creer')
<li><a class="dropdown-item" href="{{route('planiCsd')}}">Planifier une session CSD</a></li>
<!-- <li><a class="dropdown-item" href="{{route('sessionCSD')}}">Initier une session</a></li> -->

<li><a class="dropdown-item" href="{{route('absence')}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Initier une session</a></li>



@endsection



@endsection

