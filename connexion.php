<?php
session_start(); 
require_once "autoload.php"; 
$error_message = ""; 
if(isset($_SESSION["user_name"])){
    header("location: index.php"); 
    exit; 
}


if($_SERVER["REQUEST_METHOD"] === "POST"){
           try{
               $formulaire = new Formulaire($_POST); 

               // on stocke le message d'utilisateur dans session 

               $_SESSION["user_name"] = $formulaire->getNom() ; 
               header("location: index.php");
           }catch(Exception $e){
          $error_message = $e->getMessage(); 
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
     <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="">Nom</label>
    <input type="text" name="user_name" value="<?= isset($formulaire)? $formulaire->getNom() : null ?>">
    <label for="">Email</label>
    <input type="email" name="user_email" value="<?= isset($formulaire)? $formulaire->getEmail() : null ?>">
    <label for="">Mot de passe</label>
    <input type="password" name="user_mdp" value="<?= isset($formulaire)? $formulaire->getMdp() : null ?>">
    <button type="submit">Envoyez</button>
     </form>

     <?php if ($error_message): ?>
    <p style="color: red;">
        <?= htmlspecialchars($error_message) ?>
    </p>
<?php endif; ?>

</body>
</html>