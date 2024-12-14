<?php
class Formulaire{
    const ERROR_NOM = "Nom incorrect"; 
    const ERROR_EMAIL= "Email incorrect"; 
    const ERROr_MDP = "Mot de passe incorrect"; 

    private string $nom ="";
    private string $email ="";  
    private string $mdp =""; 


    public function __construct(string $nom, string $email, string $mdp){
        if(!empty($nom) && !empty($email) &&  !empty($mdp)){
            $this->setNom($nom);
            $this->setPrenom($prenom); 
            $this->setNom($nom); 
        }
    }
    public function setNom(string $nom) : void 
    {
              $nom = strtolower($nom); 

              if(iconv_strlen($nom) >= 3 && iconv_strlen($nom) <= 22 ){
                $this->nom = $nom; 
              }else{
                throw new Exception(self::ERROR_NOM); 
              }
    }
    public function setEmail(string $email): void 
    {
                 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email ; 
        }else{
            throw new Exception(self::ERROR_EMAIL); 
        }
       
   }

   public function setMdp(string $mdp): void 
   {         
                    
                $lettreMajuscule = false ;
                
                foreach(str_split[$mdp] as $caractere){
                 if(strlen($caractere)){

                 }
                }
            
                
    }






}

?>