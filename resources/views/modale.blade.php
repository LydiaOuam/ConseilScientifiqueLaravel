<!DOCTYPE html>
<html lang="{{app()->getlocale()}}">
<head>
    <meta charset='utf-8'>
    <title>@yield('titre','Accueil')</title> <!--pour que le titre sera adapte a chaque page-->
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
                      <h5 class="modal-title">Changer rôle</h5>
              </div>
                            
              @foreach($roles as $role)
                @if(in_array($role->id,$user_roles))
                  <a href="#" class="list-group-item list-group-item-action" aria-current="true" >
                    <div class="d-flex w-100 justify-content-between">
                  
                      <h5 class="mb-1">{{$role->display_name}}</h5>
                      </div>
                  </a>
                    @endif

                @endforeach
            </div>

</body>
</html>


