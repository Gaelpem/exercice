<?php
session_start(); 
require_once "autoload.php"; 
require_once('config/database.php');
if(!isset($_SESSION["user_name"])){
  header("location: connexion.php"); 
  exit; 
}

if(isset($_GET["logout"])){
  try{

  $user_name = $_SESSION[ "user_name"]; 
  $sql = "DELETE FROM connexion  WHERE user_name = :user_name"; 
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["user_name" => $user_name]); 
  
        session_unset();
        session_destroy();

        // Rediriger après déconnexion
        header("Location: connexion.php");
        exit;
} catch (PDOException $e){
  $error = "Problème lors de la suppression de l'utilisateur : " . htmlspecialchars($e->getMessage());
}
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
  <form action="" method="get">
    <button type="submit" name="logout">Deconnexion</button>
  </form>
</body>
</html>