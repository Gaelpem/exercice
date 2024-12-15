<?php

class Formulaire
{
    const ERROR_NOM = "Nom incorrect";
    const ERROR_EMAIL = "Email incorrect";
    const ERROR_MDP = "Mot de passe incorrect";

    private string $nom = "";
    private string $email = "";
    private string $mdp = "";

    public function __construct(array $data)
    {
        if (isset($data['user_name'], $data['user_email'], $data['user_mdp'])) {
            $this->setNom($data['user_name']);
            $this->setEmail($data['user_email']);
            $this->setMdp($data['user_mdp']);
        } else {
            throw new Exception("Données du formulaire incomplètes.");
        }
    }

    public function setNom(string $nom): void
    {
        $nom = strtolower($nom);

        if (iconv_strlen($nom) >= 3 && iconv_strlen($nom) <= 22) {
            $this->nom = $nom;
        } else {
            throw new Exception(self::ERROR_NOM);
        }
    }

    public function setEmail(string $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new Exception(self::ERROR_EMAIL);
        }
    }

    public function setMdp(string $mdp): void
    {
        $lettreMajuscule = false;

        foreach (str_split($mdp) as $caractere) {
            if (ctype_upper($caractere)) {
                $lettreMajuscule = true;
                break;
            }
        }

        if (!$lettreMajuscule) {
            throw new Exception(self::ERROR_MDP);
        }

        $this->mdp = $mdp;
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
