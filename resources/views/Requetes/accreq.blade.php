<!DOCTYPE html>
<html lang="{{app()->getlocale()}}">
<head>
    <meta charset='utf-8'>
    <title>@yield('titre','Accueil')</title> <!--pour que le titre sera adapte a chaque page-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
 <!-- 
     
 Le template de base qui ne change pas dans toutes les pages
 pour l'unsertion des images faut penser a utiliser la methode asset qui definera le chemin du site suive de l'url de l'image

-->
<header">
<nav class="navbar navbar-dark navbar-expand-lg" style="background-color:rgb(17, 17, 124); color:white;">
  <div  class="navbar-brand" style=" margin-top: 5px;"> 
        <span><h2>USTHB</h2></span>
  </div>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin-left:30px;">
        <ul class="navbar-nav">

          <li class="nav-item dropdown">
            <a class="nav-link" href=" @yield('soumettre')">
            <span><i class="fa fa-folder" aria-hidden="true"></i></span>
            <span>Soumettre une requête</span>
            </a>
          </li>
          
          <a target="_blank"  class="nav-link" href="{{route('Contact')}}">
            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <span>Contact</span>
          </a>

        <div class="Profil" style="margin-left:500px;">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           @if(session('user')->photo != null )
           <img src="{{asset('/images/'.session('user')->photo)}}" 
            class="img-responsive img-rounded" style="max-height: 40px; max-width: 40px; border-radius: 45%;">
           @else
           <i class="fa fa-user-circle-o" aria-hidden="true"></i>
           @endif
              <span class="title">{{session('user')->fname }} {{session('user')->name }}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a href="{{route('Profile',[session('user')->id])}}" class="dropdown-item" >
                    <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span> 
                    <span class="title">Mon profile</span>
                </a>
              </li>
              <li>
                <a href="{{route('ShowRoleUser')}}" class="dropdown-item">
                  <span class="icon"><i class="fa fa-exchange" aria-hidden="true"></i></span> 
                  <span class="title">Changer rôle</span></a>

                </a>    
              </li><!--MODIFIER ET SUPPRIMER-->
              <li>
                <a class="dropdown-item"  href="{{route('LogOut')}}">
                  <span class="icon"><i class="fa fa-power-off" aria-hidden="true"></i></span> 
                  <span class="title">Déconnexion </span>
                </a>
              </li>
            </ul>
          </li>
        </div>

      </ul>
  </div>
</nav>

<!-- Button trigger modal -->

        
        
        </div>
      </div>
    </div>
</div>


    <!--------------------------------------- Remarque : Noublie pas de changer les incons------------->
      
</header>
<!-- ---------------------------------------Ma barre de Recherche----------------------------------- -->

<nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <form action="@yield('action','/')" methode="GET" class="d-flex">
          <input class="form-control me-2" type="search" name="search" placeholder="Chercher..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>
</nav>

<body>

@include('messages')

    @yield('contenu')

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
