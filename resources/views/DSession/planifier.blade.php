@extends('DSession.accueilCSF')
    @section('titre')
        Planifier une session CSF
    @endsection

@section('scontent')


  <form  method="POST" action="{{route('SaveSessCsf')}}" enctype="multipart/form-data"style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: white;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
  @csrf

      <div style=" margin-left:30px;margin-right:30px;">
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                  Fixer la date de la session
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                <label class="form-label">Date:</label>
                  <input type="date" name="date_deb" class= "form-control" min="{{date('Y-m-d')}}">
                </div>
              </div>
            </div>
          
          <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Fixer l'ordre du jour
                </button>
              </h2>
            
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
              @foreach($points as $point)                
                          
                          <input type="checkbox" name="choix[]" value="{{$point->id}}" style="margin-left:20px;">
                          <label  id="role">{{$point->nom}}</label>
                          <br>
                @endforeach
              </div>
          </div>
        
        </div>
      </div>
  <button type="submit" class="btn btn-success" style="margin-left:50px; margin-top:20px;">Créer</button>
      
</form>


@endsection