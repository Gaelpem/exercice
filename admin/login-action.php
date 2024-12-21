<?php 


class login{

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


 public function setNom(string $nom) : void{
           
 }


}


?>