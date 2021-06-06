@extends('DSession.accueil')

@section('scontent')
<div style=" margin-left:30px;margin-right:30px;margin-top:50px;">
    <div class="accordion" id="accordionPanelsStayOpenExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
          Voir les detais d'une requete
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
          <div class="accordion-body">
            
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
          Donner une decision
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
        <div style="margin-top:20px;">
        <h6   style="margin-top:20px;margin-left:20px;"> Donner un avis</h6>
            <select class="form-select" aria-label="Default select example"  style="margin-top:20px;margin-left:20px;width:50%;">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div >
          <h6   style="margin-top:20px;margin-left:20px;"> Donner une observation</h6>
          <div class="accordion-body" id="editor"></div>
          <button type="button" class="btn btn-success"  style="margin-top:20px;margin-left:20px;">Success</button>
        </div>
        
      </div>

    </div>
</div>

<!-- ------------------------ -->




<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
</body>

