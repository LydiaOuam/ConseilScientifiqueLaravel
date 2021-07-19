<!DOCTYPE html>
<html lang="{{app()->getlocale()}}">
<head>
    <meta charset='utf-8'>
    <title>@yield('titre','Rôle')</title> <!--pour que le titre sera adapte a chaque page-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <script src='main.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="jquery-3.6.0.min.js"><\/script>')
    </script> -->
</head>
<body>

            <div class="list-group "  style="width: 500px;
              margin: 100px auto;">
                    
              <div class="modal-header">
                   
                      <h5 class="modal-title"><i class="fa fa-bars" aria-hidden="true"></i>  Choisir un rôle</h5>
              </div>
                            
              @foreach($roles as $role)
                @if(in_array($role->id,$user_roles))
<form method="POST" action="{{route('ChoisirRole',[$role->id])}}" >
    @csrf
                  <button type="submit" class="list-group-item list-group-item-action" aria-current="true" >
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{$role->display_name}}</h5>
                      </div>
                  </button>
                    @endif
</form>
                @endforeach
                <button type="button" class="btn btn-primary" onclick="window.history.back();" style="margin-top:20px;" >Annuler</button>
            </div>

</body>
</html>


