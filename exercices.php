<?php


class Devinette{
      private $a ; 
      
      public function __construct($a = null ){
        if($a !== null){
            $this->setA($a);
        }
      }

      public function setA($a){
        $mot = "legume"; 
        $trouve =false ; 
        
        if(is_string($a) && strlen($a) === 1){
            foreach(str_split($mot) as $valeur){
                if($a == strtolower($valeur)){
                $trouve = true ; 
                    break; 
                }
            }
            if($trouve){
                $this->a = $a ; 
            }else{
                throw new Exception("Lettre introuvable !"); 
            }
            
        }else{
            throw new Exception("Vous devez mettre une lettre."); 
        }
      }
      public function getA(){
        return "Lettre trouvé : " . $this->a; 
      }
     
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['letter'])){
    $letter =  trim($_POST['letter']); 
    
    if(!empty($letter)){
        
        try{
            $devinette = new Devinette(); 
            $devinette->setA($letter); 
            echo $devinette->getA(); 
        }catch(Exception $e){
            echo $e->getMessage(); 
        }
    }
}

?>



<form action="" method = "post">
    <label for="lettre">Lettre</label>
    <input type="text" name="letter" id="lettre">
    <button type="submit">Vérifier</button>
</form>