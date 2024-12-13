<?php
session_start(); 
// l'utilisateur n'est pas encore connecté redirige vers vers la page de connection
if(!isset($_SESSION["user_name"])){
    header("Location: exercices.2"); 
    exit; 
}

if(isset($_POST["button"])){
    session_destroy(); 
    haeder("Location: exercies2.php"); 
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
    <form action="" method="post">
    <h1>BIENVENUE DE TÊTE DE CON!!!!!!!!!!!!!!!!!!!!!!!</h1>
    <p>
        Vous êtes l'utilisateur 
        <?php
        echo $_SESSION["name"]; 
        ?>
    </p>
    <button type="submit" name="button">Déconnexion</button>
    </form>
</body>
</html>