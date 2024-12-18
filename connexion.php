<?php
session_start();
require_once('config/database.php');
require_once "autoload.php";
$error_message = "";

if (isset($_SESSION["user_name"])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $formulaire = new Formulaire($_POST); 
        $user_name = $formulaire->getNom();
        $user_email = $formulaire->getEmail();
        $user_password = password_hash($formulaire->getMdp(), PASSWORD_DEFAULT);

        // Vérification si un email existe déjà
        $sql = "SELECT * FROM connexion WHERE user_email = :user_email"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->execute(["user_email" => $user_email]);

        if ($stmt->fetch()) {
            $error_message = "Email existe déjà";
        } else {
            // Insertion dans la base de données
            $sql = "INSERT INTO connexion (user_name, user_email, user_passeword) 
                    VALUES (:user_name, :user_email, :user_passeword)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "user_name" => $user_name,
                "user_email" => $user_email,
                "user_passeword" => $user_password
            ]);

            // Redirection après inscription
            $_SESSION["user_name"] = $user_name; 
            header("Location: index.php"); 
            exit;
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="user_name">Nom</label>
        <input type="text" name="user_name" value="<?= isset($formulaire) ? $formulaire->getNom() : ''; ?>">
        
        <label for="user_email">Email</label>
        <input type="email" name="user_email" value="<?= isset($formulaire) ? $formulaire->getEmail() : ''; ?>">
        
        <label for="user_mdp">Mot de passe</label>
        <input type="password" name="user_mdp" value="<?= isset($formulaire) ? $formulaire->getMdp() : ''; ?>">
        
        <button type="submit">Envoyer</button>
    </form>

    <?php if ($error_message): ?>
        <p style="color: red;">
            <?= htmlspecialchars($error_message) ?>
        </p>
    <?php endif; ?>
</body>
</html>
