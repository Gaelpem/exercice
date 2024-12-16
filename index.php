<?php
session_start(); 
  require_once  "autoload.php"; 
  // si l'utilisateur n'est pas encore connecté il va à l'index

  if(!isset($_SESSION['user_name'])){
    header('location: connexion.php'); 
    exit; 
  }
  if(isset($_POST['logout'])){
   session_destroy();
   header('location: connexion.php'); 
    exit; 
    
  }


?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>BIENVENUE CONNARD !!!!! </h1>
  <form  method="post">
    <button type="submit" name="logout">Déconexion</button>
  </form>
</body>
</html>