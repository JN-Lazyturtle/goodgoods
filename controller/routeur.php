<?php

require_once "../librairie/File.php";
require(File::build_path(array('controller', "ControllerProduit.php")));

// On recupère l'action passée dans l'URL
$action = $_GET['action'];
//if (sizeof($_GET) == 2) {
//    $parametre = $_GET['immat'];
//    ControllerProduit::$action($parametre);
//} else if (sizeof($_GET) == 4) {
//    $immat = $_GET['immatriculation'];
//    $marque = $_GET['marque'];
//    $couleur = $_GET['couleur'];
//    ControllerVoiture::$action($immat, $marque, $couleur);
//} else {
    ControllerProduit::$action();
//}

