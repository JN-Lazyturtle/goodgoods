<?php
require_once(File::build_path(array("model", "ModelPanier.php")));

class ControllerPanier {

    public static function voirPanier(){
        $view='panier';
        $pagetitle='Mon panier';
        $panier = $_SESSION['panier'];
        require(File::build_path(array("view", "view.php")));
    }

    public static function majPanierAjout($idProduit, $view){
        $panier = $_SESSION['panier'];
        $panier->ajoutProduitPanierObjet($idProduit);
        if ($panier->getIdPanier() != 'temp'){
            $panier->ajoutProduitPanierBDD($idProduit);
        }
        if ($view == "panier"){
            self::voirPanier();
//            header("Location: indexx.php");
        } else {
            ControllerProduit::readAll();
        }
    }

    public static function majPanierSupp($idProduit){
        $panier = $_SESSION['panier'];
        $panier->suppProduitPanierObjet($idProduit);
        if ($panier->getIdPanier() != 'temp'){
            $panier->suppProduitPanierBDD($idProduit);
        }
        self::voirPanier();
//        header("Location: indexx.php");
    }
}


