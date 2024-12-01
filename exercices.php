<?php
class   Devinette{
       
    private $a ; 
    public function __construct($a = null){
        $this->a = $a;
    }
    public function verfiMot($a){
        $mot = "jaune,rouge,rose";
        
        $trouverMot = false; 
            if(is_string(strtolower($a))){
         
       
          
        $couleurs = explode(',', $mot); 

        $couleurs = array_map('trim', $couleurs);
        
        if (in_array(strtolower($a), $couleurs)) {
            $trouverMot = true;
        }
        
        }
        if( $trouverMot){
            $this->a = $a; 
        }else{
            throw new Exception('Couleur incorrect'); 
        }
    }

 public function affich(){
    return "Bonne couleur : ".$this->a; 
 }

}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["couleur"])){
    $couleur = trim($_POST["couleur"]); 
    
    if(!empty($couleur)){
        try{
            $devinette = new Devinette(); 
            $devinette->verfiMot( $couleur); 
            echo $devinette->affich(); 
        }catch (Exception $e){
            echo $e->getMessage(); 
        }
    }

  
}




?>


<form action="" method="post">
    <label for="">Couleur : </label>
    <input type="text" name="couleur">
    <input type="submit">

</form>