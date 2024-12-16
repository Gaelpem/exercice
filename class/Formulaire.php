<?php

class Formulaire{

   const ERROR_NOM = "Nom incorrect"; 
   const ERROR_EMAIL = "Email incorrect"; 
   const ERROR_MDP = "Mot de passe incorrect"; 

   private string $name = ""; 
   private string $email = ""; 
   private string $mdp = ""; 

   public function __construct(array $data){
    if(isset($data["user_name"],$data["user_email"],$data["user_mdp"])){
        $this->setName($data["user_name"]);
        $this->setEmail($data["user_email"]);  
        $this->setMdp($data["user_mdp)"]); 
    }
}

    public function setName(string $name): void
              {

                $name = strtolower($name); 
                if(iconv_strlen($name) > 3 && iconv_strlen($name) < 12){
                    $this->name = $name;
                }else{
                    throw new Exception(self::ERROR_NOM); 
                }
              }



              public function setEmail(string $email): void
              {

                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $this->email = $email; 
                    }else{
                        throw new Exception(self::ERROR_EMAIL); 
                    }
              }


              public function setMdp(string $mdp): void
              {
                        $lettreMajuscule = false; 

                        foreach(str_split($mdp) as $caractere){
                            if(ctype_upper($caractere)){
                                $lettreMajuscule = true; 
                            }
                        }
                   
              }






}







?>