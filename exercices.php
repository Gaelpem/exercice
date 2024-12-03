<?php
session_start(); 

if(!isset($_SESSION["mots_trouves"])){
    $_SESSION["mots_trouvee"] = []; 
}

class Devinette{
    private $word; 
    
    public function __construct($word = null){
        if($word !== null){
            $this->setLettre($word);
        }
    }

    public function setLettre($word){
        $mots = ["savon","jouet",]; 
         
        if(!is_string($word)){
        throw new Exception("Ce n'est pas une chaine de caractere"); 
        }

        $word = strtolower($word); 

        if(!in_array($word, $mots)){
            throw new Exception("Mot introuvable"); 
        }
 // Définir le mot seulement s'il est correct
        $this->word = $word; 
    }

    public function getLettre(){
        return $this->word; 
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['letter'])){
    $letter = trim($_POST['letter']); 
    if(!empty($letter))

    
    {
        try{     
        $devinette = new Devinette(); 
        $devinette->setLettre($letter);

        if(!in_array($letter,  $_SESSION["mots_trouves"])){
            $_SESSION["mots_trouves"][]= $letter ; 
        }  

        /* Si le mot soumis par l'utilisateur ($lettres) n'a pas encore été trouvé (c'est-à-dire qu'il n'est pas présent dans la session $_SESSION["mots_trouves"]),
        Alors, on l'ajoute à la liste des mots trouvés stockée dans la session.
        */

        echo $devinette->getLettre(); 
        }catch (Exception $e){
            echo $e->getMessage(); 
        }

    }
}
if(!empty($_SESSION["mots_trouves"])){
    echo "<ul>"; 
    foreach($_SESSION["mots_trouves"] as $mot){
        echo "<li>".htmlspecialchars($mot)."</li>"; 
       
    } 
    
   echo  "</ul>"; 
}else {
    echo "<p>Aucun mot trouvé pour l'instant.</p>";
}   



?>

<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="">Mot : </label>
    <input type="text" name="letter">
    <button type="submit">Verrifier</button>
</form>