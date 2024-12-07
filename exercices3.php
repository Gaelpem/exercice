<?php
session_start();
 if(!isset($_SESSION['user_name'])) {
    header("Location: exercices2.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy(); // Détruire la session
    header("Location: exercices2.php"); // Rediriger vers la page de connexion
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

<h1>bienvenu</h1>
<p>Vous êtes connecté(e) en tant que <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>

<form method="post">
    <button type="submit" name="logout">Se déconnecter</button>
</form>
    
</body>
</html>

