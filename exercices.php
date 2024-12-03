<?php

class Devinette{
    public static $lettre = null; 
    
    
    public static function verifLettre($lettre){
        $mot = "gingembre"; 
         
        if(is_string($lettre) && strlen($lettre) ===1){
        //verification si la lettre est dans le mot 
            if(strpos($mot, $lettre) !== false){
               self::$lettre = $lettre; 
            }else{
                throw new Exception("Lettre introuvable"); 
            }
        }else{
            throw new Exception("Ecrire une seule lettre"); 
        }
    }
     
    public static function affichLettre(){
        return "Lettre trouvé : " . self::$lettre; 
    }

}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["letter"])){
    $letter = trim($_POST["letter"]); 

    if(!empty($letter)){
     try{
        Devinette::verifLettre($letter); 
        echo Devinette::affichLettre(); 
     }catch(Exception $e){
        echo $e->getMessage(); 
     }
    }else{
        echo " Assigner quelque chose"  ; 
    }
}

?>

<form action="" method="post">
    <label for="">Lettre:</label>
    <input type="text" name="letter">
    <input type="submit">
</form>