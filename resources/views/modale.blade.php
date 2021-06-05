@section('role')
<h1>HI</h2>
                  <div class="modal" tabindex="-1">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Changer rôle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
        

  
  <div class="list-group">
              @foreach($roles as $role)                
                @if(in_array($role->id,$user_roles))
                  <a href="/modale" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">{{$role->display_name}}</h6>
                  </div>
                  </a>
                @endif
              @endforeach
            </div>
          
          </div>
        </div>
      </div>
  </div>
</div>
                 




@endsection