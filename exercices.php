<?php
session_start(); 

class Devinette{
    private $lettre;

    public function __construct($lettre = null){
        if($lettre !== null){
            $this->setLettre($lettre); 
        }
    }

   public function setLettre($lettre){
       $mot = "fraise"; 

       $LettreTrouver = false; 

       if(is_string(strtolower($lettre)) && strlen($lettre) === 1){
        foreach(str_split($mot) as $valeur){
           if($lettre === $valeur) {
            $LettreTrouver = true;
            break;  
           }
            
        }
        if($LettreTrouver){
            $this->lettre = $lettre; 
        } else {
            throw new Exception("Lettre incorrecte"); 
        }
       } else {
        throw new Exception("Vous devez rentrer seulement une lettre"); 
       }
   }

   public function getLettre(){
    return $this->lettre; 
   }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['letter'])){
    $letter = trim($_POST['letter']); 

    if (!empty($letter)) {
        try {
            $devinette = new Devinette(); 
            $devinette->setLettre($letter); 
            $_SESSION['letter'] = $devinette->getLettre(); // Conservez la lettre dans la session
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage(); // Conservez l'erreur dans la session
        }
    } else {
        $_SESSION['error'] = "Veuillez entrer une lettre."; 
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu de Devinette</title>
</head>
<body>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']); // Réinitialiser l'erreur
    }

    if (isset($_SESSION['letter'])) {
        echo "<p>Lettre trouvée : " . $_SESSION['letter'] . "</p>";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="letter">Déposer une lettre :</label>
        <input type="text" id="letter" name="letter" value="<?= isset($_POST['letter']) ? $_POST['letter'] : (isset($_SESSION['letter']) ? $_SESSION['letter'] : '') ; ?>">
        <input type="submit" value="Vérifier">
    </form>

    <a href="multi.php">Réinitialiser</a>
</body>
</html>
