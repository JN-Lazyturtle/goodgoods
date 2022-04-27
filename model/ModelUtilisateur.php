<?php

require_once File::build_path(array("model", "Model.php"));

class ModelUtilisateur{
    private $mail;
    private $mdp;
    private $nom;
    private $prenom;
    private $adresse;
    private $panier;


    public function __construct($mail=NULL, $mdp=NULL, $nom=NULL, $prenom=NULL, $adresse=NULL){
        if (!is_null($mail) && !is_null($mdp) && !is_null($nom) && !is_null($prenom) && !is_null($adresse)) {
            $this->mail = $mail;
            $this->mdp = $mdp;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            //$this->panier = ModelPanier::chargerPanierUtilisateur($mail);
        }
    }

    /** retourne un utilisateur, retourne faux si aucun utilisateur ne corresponds à l'association mail/mdp */
    static function getUtilisateur($mail, $mdp){
        $sql = "SELECT * FROM Utilisateurs WHERE mail=:mail AND mdp=:mdp";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail" => $mail, "mdp" => $mdp);
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $utilisateur = $req_prep->fetchAll();
        if (empty($utilisateur))
            return false;
//        $utilisateur[0]->panier = ModelPanier::chargerPanierUtilisateur($mail);
        return $utilisateur[0];
    }

    /** créer un nouvel utilisateur avec un panier vide*/
    public function save(){
        try {
            $sql = "INSERT INTO `utilisateurs` (`mail`, `mdp`, `nom`, `prenom`, `adresse`) VALUES (:mail, :mdp, :nom, :prenom, :adresse);";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array("mail" => $this->mail,
                "mdp" => $this->mdp,
                "nom" => $this->nom,
                "prenom" => $this->prenom,
                "adresse" => $this->adresse,
            );
            $req_prep->execute($values);
        }catch (PDOException $e){
            echo '<h2>Une erreur est survenue lors de la création de votre compte <a href="indexx.php"> retour a la page d\'accueil </a></h2>';
            die();
        }
    }

    /** vérifie qu'un mail ne soit pas déjà utilisé par un compte
     retourne true si le mail est libre, false si il est déjà utilisé*/
    static function mailEstDisponible($mail){
        $sql = "SELECT mail FROM Utilisateurs";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail" => $mail,);
        $req_prep->execute($values);
        $tab_mails = $req_prep->fetchAll();
        foreach ($tab_mails as $res){
            if ($res[0] == $mail){return false;}
        }
        return true;
    }

    public function __toString()
    {
        return $this->prenom." ".$this->nom." adresse mail : ".$this->mail;
    }


    public function getMail()
    {
        return $this->mail;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getPanier()
    {
        return $this->panier;
    }





}