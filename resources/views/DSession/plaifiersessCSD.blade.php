@extends('DSession.accueil')
    @section('titre')
        Planifier une session CSD
    @endsection


@section('scontent')

  <form  method="POST" action="{{route('saveCSD')}}" enctype="multipart/form-data"style="margin-top=20px; margin-top:40px ;padding:10px 70px;border-style: solid;border-color: white;border-width: 2px;padding: 5px;width: 70%;margin-left: 15%;">
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
        </div>
        <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Fixer la date limite de dépôt des dossier
                </button>
              </h2>
            
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
              <div class="accordion-body">
                <label class="form-label">Date:</label>
                  <input type="date" name="date_limite" class= "form-control" min="{{date('Y-m-d')}}">
                </div>
               
              </div>
          </div>
        </div>
      </div>
  <button type="submit" class="btn btn-success" style="margin-left:50px; margin-top:20px;">Créer</button>
      
</form>


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection