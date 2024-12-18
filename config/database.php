<?php

// Déclaration des constantes pour les paramètres de connexion à la base de données
const DB_HOST = "localhost"; // L'hôte où se trouve la base de données, généralement 'localhost' en local
const DB_NAME = "form"; // Le nom de la base de données à laquelle vous voulez vous connecter
const DB_USER = "root"; // Nom d'utilisateur pour la base de données
const DB_PASS = "root"; // Mot de passe pour cet utilisateur

/*
// Déclaration des constantes avec define
define("DB_HOST", "localhost"); // L'hôte de la base de données
define("DB_NAME", "form"); // Le nom de la base de données
define("DB_USER", "root"); // Nom d'utilisateur pour la base de données
define("DB_PASS", "root"); // Mot de passe pour cet utilisateur
*/


// Création de la chaîne DSN (Data Source Name) pour la connexion PDO
$dsn = ("mysql:host=".DB_HOST.";dbname=".DB_NAME); 
// Cette chaîne combine l'hôte et le nom de la base de données pour que PDO sache où se connecter

// Options pour configurer le comportement de la connexion PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active les exceptions en cas d'erreur de connexion ou de requête
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Les résultats seront retournés sous forme de tableaux associatifs
];

try {
    // Tentative de création d'une connexion PDO avec les paramètres spécifiés
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    // Si la connexion réussit, l'objet $pdo peut être utilisé pour interagir avec la base de données
} catch (PDOException $e) {
    // Capture l'erreur si la connexion échoue et arrête le script
    die("Erreur de connexion : " . $e->getMessage());
    // Affiche un message d'erreur contenant les détails de l'exception
}

?>
