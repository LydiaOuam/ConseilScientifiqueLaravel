<!DOCTYPE html>
<html lang="{{app()->getlocale()}}">
<head>
    <meta charset='utf-8'>
    <title>Login</title> <!--pour que le titre sera adapte a chaque page-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <script src='main.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="jquery-3.6.0.min.js"><\/script>')
    </script> -->
</head>
@include('messages')

<form  method="POST" action="{{route('Authentifier')}}" style="padding: 10px;margin-top:40px;padding:10px 70px; 2px;padding: 5px;width: 60%;margin-left: 15%;">
 @csrf
<img src="/imageLogo/téléchargement.png" alt="Logo USTHB" style="margin-left:100px;">

  <div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input type="email" class="form-control" name="login">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit">Se connecter</button>
</div>
<a href="#" class="link-primary">Mot de passe oublié ?</a>

</form>



</html>