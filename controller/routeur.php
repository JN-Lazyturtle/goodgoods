<?php

require_once File::build_path(array('controller', "ControllerPanier.php"));
require_once File::build_path(array('controller', "ControllerProduit.php"));


// On recupère l'action passée dans l'URL
if(empty($_GET)){

    //creation d'un panier temp dans $SESSION a detruire en cas de connexion
    ControllerProduit::readAll();

} else {

    $action = $_GET['action'];
    $controller = $_GET['controller'];
    $controller::$action();
}

