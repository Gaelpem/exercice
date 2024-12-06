<?php
session_start();

  class Utilisateur{
        
     private $compteur  ; 
     
     public function __construct($compteur= 0){
        
            $this->setCompteur($compteur); 
        
     }

     public function setCompteur($compteur){
          
            if(is_numeric($compteur) && $compteur>=0){
                $this->compteur = $compteur; 
            }
     }
             
    // Getter pour obtenir la valeur du compteur
    public function getCompteur() {
        return $this->compteur;
    }

    // Méthode pour incrémenter le compteur
    public function incrementerCompteur() {
        $this->compteur++;
    }


  }



  // Vérifier si le compteur existe déjà dans la session
if (!isset($_SESSION['utilisateur'])) {
    $_SESSION['utilisateur'] = new Utilisateur(0);  // Initialiser le compteur à 0
}

// Si le formulaire est soumis, incrémenter le compteur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['compteur'])) {
    $_SESSION['utilisateur']->incrementerCompteur();  // Incrémenter le compteur
}

// Récupérer la valeur actuelle du compteur
$utilisateur = $_SESSION['utilisateur'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Compteur de clics</h1>
  <p>Compteur actuel : <?= $utilisateur->getCompteur(); ?></p>
<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
     <input type="submit" name="compteur" value="click">
</form>
</body>
</html>

