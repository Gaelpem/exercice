<?php

session_start();

// Gestion des sessions
if(isset($_SESSION["user_name"])){
    header("Location: exercices3.php"); 
    exit; 
}
class Utilsateur{
    const ERROR_NAME = "nom incorrect"; 
    const ERROR_PASS = "mdp incorrect"; 
    private string $name = ""; 
    private string $mdp = ""; 

    public function __construct(string $name = "", string $mdp = "") 
{
    // Vérifie si les deux paramètres sont non vides (c'est-à-dire que des valeurs ont été fournies)
    if ($name && $mdp) {
        // Si les deux valeurs sont non vides, on utilise les méthodes pour les définir dans l'objet
        $this->setName($name);  // Affecte la valeur de $name à la propriété $name de l'objet
        $this->setMdp($mdp);    // Affecte la valeur de $mdp à la propriété $mdp de l'objet
    }
}

    public function setName($name){
        $lettre = strtolower($name); 
        if(!ctype_alpha($name) || iconv_strlen($name) < 3 || iconv_strlen($name)>30){
           echo self::ERROR_NAME;  
        }else{
             echo $this->name = $name; 
        }
    }

    public function setMdp($mdp){
           if(iconv_strlen($mdp) >= 3 && iconv_strlen($mdp)<=10){
              $this->mdp = password_hash($mdp, PASSWORD_DEFAULT); 
           }else{
             echo self::ERROR_PASS; 
           }
    }

    public function getName(){
        return $this->name; 
    }
     public function getMdp(){
        return $this->mdp; 
    }

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST["user_name"], $_POST["user_password"])){
        
        $user_name = trim($_POST["user_name"]); 
        $user_password = trim($_POST["user_password"]); 
 
        // Vérifie que les champs du nom d'utilisateur et du mot de passe ne sont pas vides
if(!empty($user_name) && !empty($user_password)) {
    // Crée une nouvelle instance de la classe Utilisateur
    $devinette = new Utilsateur();
    
    // Utilise la méthode setName pour définir le nom de l'utilisateur
    $devinette->setName($user_name); 
    
    // Utilise la méthode setMdp pour définir le mot de passe de l'utilisateur
    $devinette->setMdp($user_password); 
    
    // Affiche le nom de l'utilisateur (après avoir passé la validation dans setName)
    echo $devinette->getName() . "<br>"; 
    
    // Affiche le mot de passe (après l'avoir haché dans setMdp)
    echo $devinette->getMdp() . "<br>"; 

    // Enregistre les informations de l'utilisateur dans la session pour qu'elles soient accessibles sur d'autres pages
    $_SESSION["user_name"] = $user_name;
    $_SESSION["user_password"] = $user_password;

    // Redirige l'utilisateur vers la page 'exercices3.php' (page de bienvenue ou page protégée)
    header("Location: exercices3.php"); 
    
    // Termine l'exécution du script après la redirection
    exit; 
}

    }
}


?>
<form action="exercices2.php" method="post">
<label for="">Nom utlisateur:</label>
<input type="text" name="user_name">
<label for="">Mot de passe:</label>
<input type="password" name="user_password">
<button type="submit">verif</button>
</form>



<style>
    form{
        display:flex; 
        flex-direction: column; 
        width:50%; 
    }
</style>