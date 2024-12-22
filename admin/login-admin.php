<?php
session_start(); 
require_once "config/database.php"; // Connexion à la base
require_once "login-action.php";   // Classe Login

// Si l'admin est déjà connecté, redirection vers la page d'accueil
if (isset($_SESSION["admin_name"])) {
    header("Location: index.php");
    exit;
}

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $login = new Login($_POST); 

        $admin_user = $login->getNom(); 
        $admin_email = $login->getEmail(); 
        $admin_mdp = $login->getMdp(); 

        // Requête pour vérifier les identifiants dans la table admin // Modifier les identifiants si nécessaire
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE admin_email = :admin_email");
        $stmt->execute(['admin_email' => $admin_email]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($admin_mdp, $admin['admin_password'])) {
            // Authentification réussie : création de session
            $_SESSION["admin_name"] = $admin['admin_name'];
            $_SESSION["admin_email"] = $admin['admin_email'];

            header("Location: index.php"); // Redirection vers la page d'accueil
            exit;
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }

    } catch (Exception $e) {
        $error = "Une erreur s'est produite : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
</head>
<body>

<h2>Connexion Administrateur</h2>

<?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

<form action="" method="POST">
    <label for="admin_name">Nom</label>
    <input type="text" name="admin_name" value="" required>

    <label for="admin_email">Émail</label>
    <input type="email" name="admin_email" value="" required>

    <label for="admin_mdp">Mot de passe</label>
    <input type="password" name="admin_mdp" value="" required>
  
    <button type="submit">Se connecter</button>
</form>
    
</body>
</html>
