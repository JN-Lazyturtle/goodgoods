<?php
require_once(File::build_path(array("model", "ModelPanier.php")));

class ControllerPanier {

    public static function voirPanier(){
        $view='panier';
        $pagetitle='Mon panier';
        require(File::build_path(array("view", "view.php")));
    }

//    public static function readAll() {
//        $tab_p = ModelProduit::getAllProduits();    //appel au modèle pour gerer la BD
////        require ('../view/voiture/list.php');       //"redirige" vers la vue
//        require(File::build_path(array("view", "produits.php")));
//    }
//
//    public static function read($immat) {
//        $v = ModelVoiture::getVoitureByImmat($immat);     //appel au modèle pour gerer la BD
//        if ($v == NULL)
//            require(File::build_path(array("view", "voiture", "error.php")));
//        else
//            require(File::build_path(array("view", "voiture", "detail.php")));
//    }
//
//    public static function create(){
//        require(File::build_path(array("view", "voiture", "create.php")));
//    }
//
//    public static function created($immat, $marque, $couleur){
//        $voiture = new ModelVoiture($marque, $couleur, $immat);
//        $voiture->save();
//        self::readAll();
//    }
//
//    public static function delete($immat){
//        ModelVoiture::delete($immat);
//        self::readAll();
//    }
}


