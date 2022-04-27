<?php

require_once File::build_path(array('controller', "ControllerPanier.php"));
require_once File::build_path(array('controller', "ControllerProduit.php"));
require_once File::build_path(array('controller', "ControllerUtilisateur.php"));



// On recupère l'action passée dans l'URL
if(empty($_GET)){

    //creation d'un panier temp dans $SESSION a detruire en cas de connexion
    ControllerProduit::readAll();

} else {

    $action = $_GET['action'];
    $controller = $_GET['controller'];
    switch ($action) { # chaque cas = un nombre d'arguments
        case 0: $controller::$action(); break;
        case 1: $controller::$action($_GET[2]); break;
        case 2: $controller::$action($_GET[2], $_GET[3]); break;
        case 3: $controller::$action($_GET[2], $_GET[3], $_GET[4]); break;
        case 4: $controller::$action($_GET[2], $_GET[3], $_GET[4], $_GET[5]); break;
        case 'creerCompte': ControllerUtilisateur::creerCompte($_GET['mail'], $_GET['mdp'], $_GET[4], $_GET[5], $_GET[6]); break;
    }
}

