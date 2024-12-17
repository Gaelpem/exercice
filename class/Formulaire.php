<?php
class Formulaire{
  const ERROR_NOM = "Nom incorrect"; 
  const ERROR_EMAIL = "Email incorrect"; 
  const ERROR_MDP = "Mot de passe incorrect"; 

  private string $nom =""; 
  private string $email =""; 
  private string $mdp =""; 

  public function __construct(array $data){
    if(!empty($data["user_name"]) && !empty($data["user_email"]) &&  !empty($data["user_mdp"])){
        $this->setNom($data["user_name"]); 
        $this->setEmail($data["user_email"]); 
        $this->setMdp($data["user_mdp"]); 
    }else{
        throw new Exception("Remplissez tous les champs.");
 
    }
  }

public function setNom(string $nom): void 
{
          $nom = strtolower($nom); 
          
          if(iconv_strlen($nom) > 3 && iconv_strlen($nom) < 12 ){
            $this->nom = $nom; 
          }else{
            throw new Exception(self::ERROR_NOM); 
          }

}

public function setEmail(string $email): void 
{
          if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $this->email = $email ; 
          }else{
            throw new Exception(self::ERROR_EMAIL); 
          }

}

public function setMdp(string $mdp): void
{
            $lettreMajucule = false; 

            foreach(str_split($mdp) as $caractere){
                if(ctype_upper($caractere)){
                    $lettreMajucule = true; 
                    break; 
                }
                }
        if(!$lettreMajucule){
            throw new Exception(self::ERROR_MDP); 
        }
             
        $this->mdp = password_hash($mdp, PASSWORD_DEFAULT); 

    
    
       }

       public function getNom(): string
       {
         return $this->nom; 
       }

       public function getEmail(): string
       {
         return $this->email; 
       }
       public function getMdp(): string
       {
         return $this->mdp; 
       }
}

?> 