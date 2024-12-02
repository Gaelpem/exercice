<?php
session_start() ; 
class Devinette{
         
   private  $lettre; 
   
   public function __construct($lettre = null ){
    if($lettre !== null){
        $this->setLettre($lettre); 
    }
   }
   public function setLettre($lettre){
           $mots =["fraise","jouet"]; 
             // Convertit en minuscules pour une comparaison insensible à la casse
           $lettre = strtolower($lettre);


           if(!is_string($lettre)){
            throw new Exception("Le mot n'est pas une chaine de caractére");
           }
            
           $lettre = strtolower($lettre);

          if(!in_array($lettre, $mots)){
            throw new Exception("Le mot introuvable");
          } 
          
           
           // Définit le mot seulement s'il est correct
        $this->lettre = $lettre; 
   }
     
   public function getLettre(){
    return "Mot correct : ". $this->lettre;
   }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lettre"])){
    $lettres = trim($_POST["lettre"]); 
    $_SESSION["lettre"]=  $lettres; 
    if(!empty( $_SESSION["lettre"])){
       
        try {        
        $devinette  = new Devinette();
        $devinette->setLettre( $_SESSION["lettre"]); 
        echo $devinette->getLettre(); 
        }catch (Exception $e){
            echo $e->getMessage() ; 
        }
    }

    }




?>

<form action="<?= $_SERVER["PHP_SELF"] ; ?>" method="post">
    <label for="letter">Mot :</label>
    <input type="text" name="lettre" id="letter" value="" >
    <button type="submit">Verifier</button>
</form>