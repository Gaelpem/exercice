<?php
session_start(); 

// Si l'utilisateur est déjà connecté, redirection vers la page exercices3.php

$error_messages = [];

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
            $this->setEmail($eamil);  
            $this->setMdp($mdp);   
        }
    }

    public function setNom($nom){
             $nom = strtolower($nom); 
             if(ctype_alpha($nom)){
                if(iconv_strlen($nom) >= 3 && iconv_strlen($nom) < =)
             }


    }




}

?>

<!-- Formulaire d'inscription -->
<form action="exercices2.php" method="post">
    <label for="user_name">Name:</label>
    <input type="text" name="user_name" required>
    <label for="user_email">Email:</label>
    <input type="email" name="user_email" required>
    <label for="user_mdp">Mot de passe:</label>
    <input type="password" name="user_mdp" required>
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
