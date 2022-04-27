<?php

require(File::build_path(array("model", "ModelUtilisateur.php")));

class ControllerUtilisateur {

    /** trouve les infos correspondants à l'utilisateurs et créer un objet utilisateur stocké dans session
     * si l'association mail/mdp ne corresponds à personne dans la base, renvoies vers une page d'erreur */
    public static function connexion($mail, $mdp){
        session_start();
        $utilisateur = ModelUtilisateur::getUtilisateur($mail, $mdp);
        if ($utilisateur == false){
            require File::build_path(array("view", "erreur_connnexion.php"));
        } else {
            $_SESSION['utilisateur'] = $utilisateur;
        }
    }

    /** créer un objet utilisateur et le sauvegarde dans la base de donnée
    si il manque le mail ou le mdp on renvois sur une page d'erreur*/
    public static function creerCompte($mail, $mdp, $prenom, $nom, $adresse){
        if ($mail!='' && ModelUtilisateur::mailEstDisponible($mail) && $mdp!='' && !is_null($mdp)) {
        $utilisateur = new ModelUtilisateur($mail, $mdp, $nom, $prenom, $adresse);
        $utilisateur->save();
        }else{require File::build_path(array("view", "erreur_connnexion.php"));}
    }

}


