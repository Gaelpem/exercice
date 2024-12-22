<?php 


class Login{

    const ERREUR_NOM = "Nom incorrect"; 
    const ERREUR_EMAIL = "Email  incorrect"; 
    const ERREUR_MDP = "Mot de passe  incorrect"; 

    private string $nom = ""; 
    private string $email = ""; 
    private string $mdp = ""; 

    public function __construct(array $data){
        
        if(!empty($data["admin_name"]) && !empty($data["admin_email"])  && !empty($data["admin_mdp"]) ){
             
            $this->setNom($data["admin_name"]); 
            $this->setNom($data["admin_email"]); 
            $this->setNom($data["admin_mdp"]); 
        }else{
            throw new Exception("Remplir tous les champs"); 
        }
        
    }


 public function setNom(string $nom) : void
 {
           $nom = strtolower($nom); 

           if(iconv_strlen($nom) > 3 &&  iconv_strlen($nom) < 22){
            $this->nom = $nom ; 
           }else{
            throw new Exception(self:ERREUR_NOM); 
           }
 }



 public function setEmail(string $email ) : void
    {
    if(filter_var($email, FILTER_VALIDE_EMAIL)){
        $this->email = $email ;  
    }else{
            throw new Exception(self:ERREUR_EMAIL); 
           }
   }


   public function setMdp(string $mdp ) : void
   {
                 $caractereSpecials = "$*:/?!=+"; 
                 
                 $caractere_Spe = false; 

                foreach(str_split($caractereSpecials) as $caractere){
                  if(strpos($mdp, $caractere) !== false){
                    $caractere_Spe = true; 
                    break; 
                  }
                }
             
                if(!$caractere_Spe){
                    throw new Exception(self::ERROR_MDP); 
                }
        $this->mdp = $mdp ; 

  }

  public function getName() : string
   {
          $this->name ; 

  }

  public function getEmail() : string
   {
          $this->email; 

  }

  public function getMdp() : string
  {
         $this->mdp; 

 }



}


?>