<?php
 
 class Formulaire{

    const ERROR_NOM ="Nom incorrect";
    const ERROR_EMAIL ="Email incorrect" ;
    const ERROR_MDP ="Mot de passe incorrect";

    private string $name =""; 
    private string $email =""; 
    private string $mdp =""; 


    public function __construct(array $data){
        if(!empty($data["user_name"]) && !empty($data["user_email"]) && !empty($data["user_mdp"])){
            $this->setName($data["user_name"]); 
            $this->setEmail($data["user_email"]);
            $this->setMdp($data["user_mdp"]);
        }else{
            throw new Exception("Obligation de remplir tous les champs"); 
        }
    }

    public function setName(string $name): void
    {
                        $name = strtolowert($name) ; 
                        
                        if(iconv_strlen($name) > 2 && iconv_strlen($name) < 20){
                            $this->name = $name; 
                        }else{
                            throw new Exception(self::ERROR_NOM) ; 
                        }
                    
  }

  public function setEmail(string $email): void
    {
                    if(filter_var($email, FILTER_VALIDE_EMAIL)){
                        $this->email = $email; 
                    }else{
                        throw new Exception(self::ERROR_EMAIL); 
                    }
                    
  } 

  public function setMdp(string $mdp): void
                
    {
                $UneLettreMajuscule = false; 
                foreach(str_split(ctype_upper($mdp)) as $majuscule){
                    if(strpos($mdp, $majuscule) !== false){
                        $UneLettreMajuscule = true; 
                        break; 
                    }
                }

                if(!$UneLettreMajuscule){
                    throw new Exception(self::ERROR_MDP); 
                }
                
            $this->mdp = $mdp; 
                    
  } 







 }


?>
