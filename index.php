<?php
session_start();
require_once "autoload.php";

$errorMessage = "";

if (isset($_SESSION['user_name'])) {
    header("location: connexion.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Crée une instance de Formulaire en transmettant $_POST
        $formulaire = new Formulaire($_POST);

        // Stocker les données dans la session si tout est valide
        $_SESSION['user_name'] = $formulaire->getNom();
        header("location: connexion.php");
        exit;

    } catch (Exception $e) {
        $errorMessage = $e->getMessage(); // Capture et affiche les erreurs
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
        <label for="user_name">Nom</label>
        <input type="text" name="user_name" value="<?= htmlspecialchars($_POST['user_name'] ?? '') ?>">

        <label for="user_email">Email</label>
        <input type="text" name="user_email" value="<?= htmlspecialchars($_POST['user_email'] ?? '') ?>">

        <label for="user_mdp">Mot de passe</label>
        <input type="password" name="user_mdp" value="">

        <button type="submit">Connexion</button>
    </form>

    <?php if ($errorMessage): ?>
        <p style="color: red;"><?= htmlspecialchars($errorMessage); ?></p>
    <?php endif; ?>
</body>
</html>
