<?php
  require_once  "autoload.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $SERVER["PHP_SELF"]?>" method="post">
       <label for="">Nom</label>
       <input type="text" name="user_name">
       <label for="">Email</label>
       <input type="text" name="user_email">
       <label for="">Mot de passe</label>
       <input type="password" name="user_mdp">
       <button  type="submit">Connexion</button>
    </form>
    



</body>
</html>