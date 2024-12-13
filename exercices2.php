<?php
session_start(); 

if(isset($_SESSION["user_name"])){
    header("Location = exercices `ù3.php"); 
    exit; 
}
// Si l'utilisateur est déjà connecté, redirection vers la page exercices3.php



class Utilisateur {
    const ERROR_NOM  = "Nom incorrect "; 
    const ERROR_PRENOM  = "Prenom incorrect "; 
    const ERROR_EMAIL  = "Email incorrect"; 
    const ERROR_MDP  = "Mot de passe incorrect"; 

    private string $nom = ""; 
    private string $prenom = ""; 
    private string $email = ""; 
    private string $mdp = ""; 

    public function __construct(string $nom, string $prenom, string $email,string $mdp){
        if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($mdp)){
            $this->setNom($nom);
            $this->setPrenom($prenom); 
            $this->setEmail($email);  
            $this->setMdp($mdp);   
        }
    }

    public function setNom(string $nom): void 
    {
             $nom = strtolower($nom); 
             if(ctype_alpha($nom)){
                if(iconv_strlen($nom) >= 3 && iconv_strlen($nom) <= 22){
                    $this->nom = $nom ; 
                }else{
                    throw new Exception(self::ERROR_NOM); 
                }
             }else{
                throw new Exception(self::ERROR_NOM); 
             }
    }

    public function setPrenom(string $prenom): void
    {
        $prenom= strtolower($prenom); 

        if(!ctype_alpha($prenom)){
           if(iconv_strlen($prenom) <= 3 || iconv_strlen($prenom) >=22){
                 throw new Exception(self::ERROR_PRENOM);
           }else{
            $this->prenom = $prenom; 
           }
        }
}

     public function setEmail(string $email) : void 
     {
            $email =  strtolower($email); 
           
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->email = $email; 
            }else{
             throw new Exception(self::ERROR_EMAIL); 
            }
     }



      public function setMdp(string $mdp): void 
      {
        $caractereSpeciaux  = "?!=+%"; 
        $caractereSpe = false; 

        foreach(str_split($caractereSpeciaux) as $caractere){
            if(strpos($mdp, $caractere) !== false){
                $caractereSpe = true;
                break; // Arrête la boucle dès qu'on trouve un caractère spécial
            }else{
                throw new Exception(self::ERROR_MDP); 
            }
        }

         if(strlen($mdp) >=8 && preg_match('/[A-Za-z]/', $mdp) && preg_match('/[0-9]/', $mdp) &&  $caractereSpe){
                 $this->mdp = password_hash($mdp, PASSWORD_BCRYPT); 
         }else{
            throw new Exception(self::ERROR_MDP); 
        }
        
      }


      public function getNom(){
        return $this->nom ; 
      }
      public function getPrenom(){
        return $this->prenom ; 
      }
      public function getEmail(){
        return $this->email ; 
      }
      public function getMdp(){
        return $this->mdp; 
      }

}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["user_name"], $_POST["user_prenom"], $_POST["user_email"], $_POST["user_mdp"])){
        $user_name = htmlspecialchars(trim($_POST["user_name"])); 
        $user_prenom = htmlspecialchars(trim($_POST["user_prenom"]));
        $user_email = htmlspecialchars(trim($_POST["user_email"]));
        $user_mdp = htmlspecialchars(trim($_POST["user_mdp"]));


        if(!empty($user_name) && !empty($user_prenom) && !empty($user_email) && !empty($user_mdp)){
            try{
                $utilisateur = new Utilisateur($user_name, $user_prenom, $user_email,$user_mdp); 

                $_SESSION["user_name"] = $utilisateur->getName(); 
                $_SESSION["user_prenom"] = $utilisateur->getPrenom(); 
                $_SESSION["user_email"] = $utilisateur->getEmail(); 
                $_SESSION["user_mdp"] = $utilisateur->getMdp(); 
                //Les informations validées de l'utilisateur sont sauvegardées dans la session pour les utiliser ultérieurement.

                header("Location: exercices3.php"); 
                exit; 
            }catch (Exception $e){
                echo $e->getMessage(); 
            }
        }else{
            echo "Veuillez défnir quelque chose "; 
        }

    }

    }

?>

<!-- Formulaire d'inscription -->
<form action="<?php $_SERVER["PHP_SELF"] ?>"method="post">
    <label for="user_name">Name</label>
    <input type="text" name="user_name">
    <label for="user_prenom">Prenom</label>
    <input type="text" name="user_prenom">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" >
    <label for="user_mdp">Mot de passe</label>
    <input type="password" name="user_mdp" >
    <button type="submit">Connexion</button>
</form>

<!-- Affichage des erreurs -->
<?php if (!empty($error_messages)): ?>
    <div class="errors">
        <?php foreach ($error_messages as $error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Style pour le formulaire -->
<style>
    form {
        display: flex; 
        flex-direction: column; 
        width: 300px; 
    }

    .errors {
        margin-top: 10px;
    }
</style>
