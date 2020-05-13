<?php
session_start();
include_once('DB.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Site</title>

  <!-- Bootstrap core CSS -->


  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="/main.js"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="bg-light">


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">CrazyOil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/index.php">Главная</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Каталог</a>
      </li>
      <?php  if($_SESSION['id'] == ''){ ?>
      <li class="nav-item">
        <a class="nav-link" href="/auth.php">Вход</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/registration.php">Регистрация</a>
      </li>
      <?php  } 
      else {
      ?>
      <li class="nav-item">
        <a class="nav-link" href="/cart.php">Корзина</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <p class="text-white"><?php echo $_SESSION['login'];?>
        <button type="button" class="btn btn-light"><a href="/exit.php">Выход</a></button>
  </div>
      <?php } ?>
  </div>

</nav>

  </body>

</html>