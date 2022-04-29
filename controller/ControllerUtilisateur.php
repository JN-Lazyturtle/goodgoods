<?php

require(File::build_path(array("model", "ModelUtilisateur.php")));
require_once (File::build_path(array("controller", 'ControllerProduit.php')));

class ControllerUtilisateur {

    public static function formConnexion(){
        $view='connexion';
        $pagetitle='Se connecter';
        require(File::build_path(array("view", "view.php")));
    }

    public static function formCreationCompte(){
        $view='creationCompte';
        $pagetitle='Créez un compte';
        require(File::build_path(array("view", "view.php")));
    }

    /** trouve les infos correspondants à l'utilisateurs et créer un objet utilisateur stocké dans session
     * si l'association mail/mdp ne corresponds à personne dans la base, renvoies vers une page d'erreur */
    public static function connexion($mail, $mdp){
        $utilisateur = ModelUtilisateur::getUtilisateur($mail, $mdp);
        if ($utilisateur == false){
            $view='erreur_connexion';
            $pagetitle='Erreur connexion';
            require File::build_path(array("view", "view.php"));
        } else {
            $_SESSION['utilisateur'] = $utilisateur;
            header('Location: indexx.php');
        }
    }

    /** créer un objet utilisateur et le sauvegarde dans la base de donnée
    si il manque le mail ou le mdp on renvois sur une page d'erreur*/
    public static function creerCompte($mail, $mdp, $prenom, $nom, $adresse){
        if ($mail!='' && ModelUtilisateur::mailEstDisponible($mail) && $mdp!='' && !is_null($mdp)) {
            $utilisateur = new ModelUtilisateur($mail, $mdp, $nom, $prenom, $adresse);
            $utilisateur->save();
            ControllerUtilisateur::connexion($mail, $mdp);
        }else {
            $view = 'erreur_connexion';
            $pagetitle = 'Erreur connexion';
            require File::build_path(array("view", "view.php"));
        }
    }

}


