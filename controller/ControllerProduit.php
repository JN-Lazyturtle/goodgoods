<?php
require_once(File::build_path(array("model", "ModelProduit.php")));

class ControllerProduit {
    public static function readAll() {
        $tab_p = ModelProduit::getAllProduits();
        $view='produits';
        $pagetitle='Nos Good Goods';
        require(File::build_path(array("view", "view.php")));
    }
}


