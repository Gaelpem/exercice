

<?php
// Démarrer la session pour pouvoir accéder à la session existante
session_start();

// Vider toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page principale
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>



