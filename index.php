<?php
session_start(); 
require_once "autoload.php"; 
if(!isset($_SESSION["user_name"])){
  header("Lcation: connexion.php"); 
  exit; 
}

if(isset($_POST["logout"])){
         session_destroy(); 
         header("location: connexion.php"); 
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
  <h1>Bienvenue connard!!!!!!</h1>
  <p style="color: red ; ">
      <?php
         echo "Vous êtes l'utilisateur" . $_SESSION["user_name"]; 
      ?>
    
  </p>
  <form action="" method="post">
    <button type="submit" name="logout">Deconnexion</button>
  </form>
</body>
</html>